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

namespace ILIAS\Authentication\Login\Adapter;

use ilDBConstants;
use ilDBInterface;
use ILIAS\Authentication\Login\Port\Lockout\LoginAttemptRepository;
use ILIAS\Authentication\Login\Port\Account\LoginTimestampsRepository;
use ILIAS\Authentication\Login\Port\Password\PasswordChangeTrackingRepository;
use ILIAS\Authentication\Login\Port\Lockout\AccountDeactivation;
use ILIAS\Authentication\Login\UserId;
use ilUtil;

final readonly class UserAdapter implements
    LoginAttemptRepository,
    LoginTimestampsRepository,
    PasswordChangeTrackingRepository,
    AccountDeactivation
{
    public const string USER_AUTH_DATA_TABLE_NAME = 'usr_auth_data';

    private ilDBInterface $db;

    public function __construct(ilDBInterface $db)
    {
        $this->db = $db;
    }

    public function getCount(UserId $user_id): int
    {
        $result = $this->db->queryF('SELECT login_attempts FROM ' . self::USER_AUTH_DATA_TABLE_NAME . ' WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );
        $record = $this->db->fetchAssoc($result);
        return (int) ($record['login_attempts'] ?? 0);
    }

    public function increment(UserId $user_id): void
    {
        $this->db->manipulateF('UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET login_attempts = (login_attempts + 1) WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );
    }

    public function reset(UserId $user_id): void
    {
        $this->db->manipulateF(
            'UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET login_attempts = 0 WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );
    }

    public function refreshLogin(UserId $user_id): void
    {
        $this->db->manipulateF(
            'UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET last_login = %s WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER, ilDBConstants::T_INTEGER],
            [time(), $user_id->value()]
        );
    }

    public function resetLastChange(UserId $user_id): void
    {
        $this->db->manipulateF(
            'UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET last_password_change = 0 WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );
    }

    public function deactivate(UserId $user_id): void
    {
        $this->db->manipulateF(
            'UPDATE usr_data SET active = 0, inactivation_date = %s WHERE usr_id = %s',
            ['timestamp', 'integer'],
            [ilUtil::now(), $user_id->value()]
        );
    }
}
