<?php

/**
 * This file is part of ILIAS, a powerful learning management system
 * published by ILIAS open source e-Learning e.V.
 *
 * ILIAS is licensed with the GPL-3.0,
 * see https://www.gnu.org/licenses/gpl-3.0.en.html
 * You should have received a copy of said license along with the
 * source code, too.
 *
 * If this is not the case or you just want to try ILIAS, you'll find
 * us at:
 * https://www.ilias.de
 * https://github.com/ILIAS-eLearning
 *
 *********************************************************************/

declare(strict_types=1);

namespace ILIAS\Authentication\Login;

use ilAuthModeDetermination;
use ilAuthUtils;
use ilDBConstants;
use ilObjUser;

final readonly class FailedLoginCandidateResolver
{
    private \ilDBInterface $db;

    public function __construct(\ilDBInterface $db)
    {
        $this->db = $db;
    }

    /**
     * @param \ilAuthCredentials $credentials
     * @return list<UserId>
     */
    public function resolve(\ilAuthCredentials $credentials): array
    {
        $auth_determination = ilAuthModeDetermination::_getInstance();
        if ($credentials->getAuthMode() !== '') {
            $auth_modes = [
                $credentials->getAuthMode()
            ];
        } else {
            $auth_modes = $auth_determination->getAuthModeSequence($credentials->getUsername());
        }

        $determined_logins = [];

        foreach (array_filter($auth_modes) as $auth_mode) {
            if ((int) $auth_mode !== ilAuthUtils::AUTH_LOCAL) {
                $login = ilObjUser::_checkExternalAuthAccount(
                    ilAuthUtils::_getAuthModeName($auth_mode),
                    $credentials->getUsername(),
                    false
                );
                if (!is_string($login) || $login === '') {
                    continue;
                }

                $determined_logins[] = $login;
            }

            $login = $credentials->getUsername();
            if ($login === '') {
                continue;
            }

            $determined_logins[] = $login;
        }

        if ($determined_logins === []) {
            return [];
        }

        $determined_logins = array_unique($determined_logins);

        $query = 'SELECT usr_id, auth_mode FROM usr_data WHERE ' . $this->db->in('login', $determined_logins, false, ilDBConstants::T_TEXT);
        $result = $this->db->query($query);

        $ids = [];
        while ($record = $this->db->fetchAssoc($result)) {
            $usr_id = (int) $record['usr_id'];
            $usr_auth_mode = $record['auth_mode'];
            foreach (array_filter($auth_modes) as $auth_mode) {
                if ((int) $auth_mode === ilAuthUtils::AUTH_LOCAL) {
                    // Mantis #47987: A failed local login must only count against an
                    // account that can actually be authenticated locally. Without this
                    // check, external accounts (e.g., Shibboleth/SAML) whose login name
                    // is entered in the local login form get their login attempts
                    // incremented and are eventually deactivated - even though a local
                    // login is impossible for them because "Allow Local Authentication"
                    // is disabled. This mirrors the gate in ilAuthProviderDatabase.
                    if (
                        $usr_id <= 0
                        || !ilAuthUtils::isLocalPasswordEnabledForAuthMode((int) ilAuthUtils::_getAuthMode($usr_auth_mode))
                    ) {
                        continue 2;
                    }
                }
            }
            $ids[] = new UserId($usr_id);
        }

        return $ids;
    }
}
