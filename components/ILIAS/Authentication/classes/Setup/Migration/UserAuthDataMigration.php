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

namespace ILIAS\Authentication\Setup\Migration;

use ilDatabaseException;
use ilDatabaseUpdatedObjective;
use ilDBConstants;
use ilDBPdoInterface;
use ilDBStatement;
use ILIAS\Setup\Environment;
use ILIAS\Setup\Migration;
use ReflectionClass;

class UserAuthDataMigration implements Migration
{
    public const int NUMBER_OF_STEPS = 10;
    public const int NUMBER_OF_USERS_PER_STEP = 10;

    private ilDBPdoInterface $db;
    private ilDBStatement $prepared_statement;

    public function getLabel(): string
    {
        return new ReflectionClass($this)->getShortName();
    }

    public function getDefaultAmountOfStepsPerRun(): int
    {
        return self::NUMBER_OF_STEPS;
    }

    public function getPreconditions(Environment $environment): array
    {
        return [
            new ilDatabaseUpdatedObjective()
        ];
    }

    public function prepare(Environment $environment): void
    {
        $this->db = $environment->getResource(Environment::RESOURCE_DATABASE);
        $this->prepared_statement = $this->db->prepareManip(
            'INSERT INTO usr_auth_data (usr_id, last_login, login_attempts, last_password_change) VALUES (?, ?, ?, ?)',
            [
                ilDBConstants::T_INTEGER,
                ilDBConstants::T_INTEGER,
                ilDBConstants::T_INTEGER,
                ilDBConstants::T_INTEGER
            ]
        );
    }

    /**
     * @throws ilDatabaseException
     */
    public function step(Environment $environment): void
    {
        $this->db->setLimit(self::NUMBER_OF_USERS_PER_STEP);

        $select_fields = [
            'usr.usr_id',
            'usr.last_login',
            'usr.login_attempts',
            'usr.last_password_change',
        ];

        $result = $this->db->query(
            'SELECT ' . implode(', ', $select_fields) . ' FROM usr_data usr'
            . ' LEFT JOIN usr_auth_data auth ON auth.usr_id = usr.usr_id'
            . ' WHERE auth.usr_id IS NULL'
        );

        /** @var array{
         *     usr_id: int,
         *     last_login: string|null,
         *     login_attempts: int,
         *     last_password_change: int
         * } $row
         */
        while ($row = $this->db->fetchAssoc($result)) {
            $usr_id = $row['usr_id'];
            $last_login = $row['last_login'] ? strtotime($row['last_login']) : null;
            $login_attempts = $row['login_attempts'];
            $last_password_change = $row['last_password_change'];

            $this->db->execute(
                $this->prepared_statement,
                [
                    $usr_id,
                    $last_login,
                    $login_attempts,
                    $last_password_change
                ]
            );
        }


        if ($this->getRemainingAmountOfSteps() === 0) {
            foreach (['last_login', 'login_attempts', 'last_password_change'] as $column) {
                $this->db->dropTableColumn('usr_data', $column);
            }
        }
    }


    public function getRemainingAmountOfSteps(): int
    {
        $result = $this->db->query(
            'SELECT COUNT(usr_data.usr_id) missing_usr_ids FROM usr_data'
            . ' LEFT JOIN usr_auth_data ON usr_data.usr_id = usr_auth_data.usr_id'
            . ' WHERE usr_auth_data.usr_id IS NULL'
        );
        $row = $this->db->fetchAssoc($result);

        $remaining = (int) $row['missing_usr_ids'];
        return (int) ceil($remaining / self::NUMBER_OF_USERS_PER_STEP);
    }
}
