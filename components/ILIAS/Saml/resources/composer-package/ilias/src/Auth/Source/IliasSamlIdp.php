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

namespace SimpleSAML\Module\ilias\Auth\Source;

use ilAuthFrontendCredentials;
use ilAuthFrontendFactory;
use ilAuthProviderDatabase;
use ilAuthStatus;
use ILIAS\Authentication\Password\LocalUserPasswordManager;
use ilObjUser;
use ilPasswordException;
use ilUserException;
use ReflectionException;
use ReflectionMethod;
use SimpleSAML\Error\Error;
use SimpleSAML\Error\ErrorCodes;
use SimpleSAML\Module\core\Auth\UserPassBase;

class IliasSamlIdp extends UserPassBase
{
    /**
     * @param string $username
     * @param string $password
     * @return array
     * @throws Error
     * @throws ReflectionException
     * @throws ilPasswordException
     * @throws ilUserException
     */
    protected function login(string $username, string $password): array
    {
        global $DIC;
        $user = new ilObjUser(ilObjUser::getUserIdByLogin($username));
        if ($user->getId() === 0 || !LocalUserPasswordManager::getInstance()->verifyPassword($user, $password)) {
            throw new Error(ErrorCodes::WRONGUSERPASS);
        }

        $credentials = new ilAuthFrontendCredentials();
        $credentials->setUsername($username);
        $credentials->setPassword($password);
        $provider = new ilAuthProviderDatabase($credentials);

        $authStatus = ilAuthStatus::getInstance();
        $authStatus->setStatus(ilAuthStatus::STATUS_AUTHENTICATED);
        $authStatus->setAuthenticatedUserId($user->getId());

        $frontend_factory = new ilAuthFrontendFactory();
        $frontend_factory->setContext(ilAuthFrontendFactory::CONTEXT_STANDARD_FORM);
        $authFrontend = $frontend_factory->getFrontend(
            $DIC['ilAuthSession'],
            $authStatus,
            $credentials,
            [$provider]
        );

        $handleAuthenticationSuccess = new ReflectionMethod($authFrontend, "handleAuthenticationSuccess");
        $handleAuthenticationSuccess->invoke($authFrontend, $provider);

        switch ($authStatus->getStatus()) {
            case ilAuthStatus::STATUS_AUTHENTICATED:
                return [
                    'uid' => [$username],
                    'displayName' => [$user->getPublicName()],
                    'eduPersonAffiliation' => ['member', 'employee'],
                ];
            case ilAuthStatus::STATUS_ACCOUNT_MIGRATION_REQUIRED:
            case ilAuthStatus::STATUS_AUTHENTICATION_FAILED:
            default:
                throw new Error(ErrorCodes::WRONGUSERPASS);
        }
    }
}
