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

use ilDBConstants;
use ILIAS\Authentication\Login\Repository\UserAuthDataRepository;

final readonly class LoginSubjectFactory
{
    private UserAuthDataRepository $user_auth_data_repo;

    public function __construct(
        private \ilDBInterface $db
    ){
        $this->user_auth_data_repo = new UserAuthDataRepository($this->db);
    }

    public function forUserId(UserId $user_id): LoginSubject
    {
        $select_fields = [
            'active',
            'client_ip',
            'time_limit_unlimited',
            'time_limit_from',
            'time_limit_until',
            'auth_data.*',
        ];

        $result = $this->db->queryF(
            'SELECT ' . implode(', ', $select_fields) . ' FROM usr_data'
            . ' LEFT JOIN ' . UserAuthDataRepository::USER_AUTH_DATA_TABLE_NAME . ' auth_data ON auth_data.usr_id = usr_data.usr_id'
            . ' WHERE usr_data.usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );
        $record = $this->db->fetchAssoc($result);

        if (!$record) {
             throw new \RuntimeException("User not found: " . $user_id->value());
        }

        return new LoginSubject(
            $user_id,
            (bool) $record['active'],
            (string) ($record['client_ip'] ?? ''),
            (bool) $record['time_limit_unlimited'],
            (int) $record['time_limit_from'],
            (int) $record['time_limit_until'],
            session_id(),
            $this->user_auth_data_repo->map($record)
        );
    }
}
