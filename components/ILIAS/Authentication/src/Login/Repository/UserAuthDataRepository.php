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


namespace ILIAS\Authentication\Login\Repository;

use DateTime;
use ilDBConstants;
use ilDBInterface;
use ilException;
use ILIAS\Authentication\Login\Model\UserAuthData;
use ILIAS\Authentication\Login\Port\Account\LoginTimestampsRepository;
use ILIAS\Authentication\Login\Port\Lockout\AccountDeactivation;
use ILIAS\Authentication\Login\Port\Lockout\LoginAttemptRepository;
use ILIAS\Authentication\Login\Port\Password\PasswordChangeTrackingRepository;
use ILIAS\Authentication\Login\UserId;
use ilUtil;

class UserAuthDataRepository implements
    LoginAttemptRepository,
    LoginTimestampsRepository,
    PasswordChangeTrackingRepository,
    AccountDeactivation
{
    public const string USER_AUTH_DATA_TABLE_NAME = 'usr_auth_data';

    public function __construct(private readonly ilDBInterface $db)
    {
    }

    public function getFor(UserId $user_id): UserAuthData
    {
        $result = $this->db->queryF('SELECT * FROM ' . self::USER_AUTH_DATA_TABLE_NAME . ' WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );
        $row = $this->db->fetchAssoc($result);
        return $row ? $this->map($row) : new UserAuthData($user_id);
    }

    /**
     * @param list<UserId> $ids
     * @return list<UserAuthData>
     */
    public function getForIds(array $ids): array
    {
        $result = $this->db->query(
            'SELECT * FROM ' . self::USER_AUTH_DATA_TABLE_NAME
            . ' WHERE ' . $this->db->in(
                'usr_id',
                array_map(static fn(UserId $user_id): int => $user_id->value(), $ids),
                false,
                ilDBConstants::T_INTEGER
            ),
        );

        $data = [];

        while ($row = $this->db->fetchAssoc($result)) {
            $data[] = $this->map($row);
        }
        return $data;
    }

    public function store(UserAuthData $user_auth_data): void
    {
        if ($this->existsFor($user_auth_data->getUserId())) {
            $this->db->update(
                self::USER_AUTH_DATA_TABLE_NAME,
                [
                    'login_attempts' => [ilDBConstants::T_INTEGER, $user_auth_data->getLoginAttempts()],
                    'last_login' => [ilDBConstants::T_INTEGER, $user_auth_data->getLastLogin()?->getTimestamp()],
                    'last_password_change' => [ilDBConstants::T_INTEGER, $user_auth_data->getLastPasswordChange()?->getTimestamp()]
                ],
                [
                    'usr_id' => [ilDBConstants::T_INTEGER, $user_auth_data->getUserId()->value()]
                ]
            );
        } else {
            $this->db->insert(
                self::USER_AUTH_DATA_TABLE_NAME,
                [
                    'usr_id' => [ilDBConstants::T_INTEGER, $user_auth_data->getUserId()->value()],
                    'login_attempts' => [ilDBConstants::T_INTEGER, $user_auth_data->getLoginAttempts()],
                    'last_login' => [ilDBConstants::T_INTEGER, $user_auth_data->getLastLogin()?->getTimestamp()],
                    'last_password_change' => [ilDBConstants::T_INTEGER, $user_auth_data->getLastPasswordChange()?->getTimestamp()]
                ]
            );
        }
    }

    /**
     * @return list<UserAuthData>
     * @throws ilException
     */
    public function getByInactivityPeriod(int $period_in_days): array
    {
        if ($period_in_days < 1) {
            throw new ilException('Invalid period given');
        }

        $timestamp = (time() - ($period_in_days * 24 * 60 * 60));

        $result = $this->db->queryF(
            'SELECT * FROM ' . self::USER_AUTH_DATA_TABLE_NAME . ' WHERE last_login IS NOT NULL AND last_login < %s',
            [ilDBConstants::T_INTEGER],
            [$timestamp]
        );

        $data = [];

        while ($row = $this->db->fetchAssoc($result)) {
            $data[] = $this->map($row);
        }

        return $data;
    }

    /**
     * @return list<UserAuthData>
     */
    public function getByNeverLoggedIn(int $threshold_in_days): array
    {
        $timestamp = (time() - ($threshold_in_days * 24 * 60 * 60));

        $result = $this->db->queryF(
            'SELECT auth_data.* FROM ' . self::USER_AUTH_DATA_TABLE_NAME . ' auth_data'
            . ' INNER JOIN usr_data ON usr_data.usr_id = auth_data.usr_id AND create_date < %s'
            . ' WHERE auth_data.last_login IS NULL',
            [ilDBConstants::T_INTEGER],
            [$timestamp]
        );

        $data = [];

        while ($row = $this->db->fetchAssoc($result)) {
            $data[] = $this->map($row);
        }

        return $data;
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

    public function refreshLogin(UserAuthData $user_auth_data): void
    {
        $last_login = time();
        $this->db->manipulateF(
            'UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET last_login = %s WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER, ilDBConstants::T_INTEGER],
            [$last_login, $user_auth_data->getUserId()->value()]
        );

        $user_auth_data->setLastLogin(new DateTime()->setTimestamp($last_login));
    }

    public function resetLastChange(UserAuthData $user_auth_data): void
    {
        $this->db->manipulateF(
            'UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET last_password_change = 0 WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER],
            [$user_auth_data->getUserId()->value()]
        );

        $user_auth_data->setLastPasswordChange(null);
    }

    public function setLastChangeToNow(UserAuthData $user_auth_data): void
    {
        $user_auth_data->setLastPasswordChange(new DateTime()->setTimestamp(time()));

        $this->db->manipulateF(
            'UPDATE ' . self::USER_AUTH_DATA_TABLE_NAME . ' SET last_password_change = %s WHERE usr_id = %s',
            [ilDBConstants::T_INTEGER, ilDBConstants::T_INTEGER],
            [$user_auth_data->getLastPasswordChangeTimestamp(), $user_auth_data->getUserId()->value()]
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

    public function existsFor(UserId $user_id): bool
    {
        $result = $this->db->queryF(
            'SELECT EXISTS(SELECT 1 FROM ' . self::USER_AUTH_DATA_TABLE_NAME . ' WHERE usr_id = %s) AS does_exist',
            [ilDBConstants::T_INTEGER],
            [$user_id->value()]
        );

        return (bool) ($this->db->fetchAssoc($result)['does_exist'] ?? false);
    }

    public function map(array $row): UserAuthData
    {
        $last_login = $row['last_login'];
        $last_password_change = $row['last_password_change'];
        return new UserAuthData(
            new UserId((int) $row['usr_id']),
            $row['login_attempts'] ?? 0,
            $last_login ? new DateTime()->setTimestamp((int) $last_login) : null,
            $last_password_change ? new DateTime()->setTimestamp((int) $last_password_change) : null
        );
    }
}
