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

namespace ILIAS\Authentication\Setup;

use ilDatabaseUpdateSteps;
use ilDBConstants;
use ilDBInterface;

class AuthenticationDatabaseUpdateSteps implements ilDatabaseUpdateSteps
{
    protected ilDBInterface $db;

    public function prepare(ilDBInterface $db): void
    {
        $this->db = $db;
    }

    public function step_1(): void
    {
        if (!$this->db->tableExists('usr_auth_data')) {
            $this->db->createTable('usr_auth_data', [
                'usr_id' => [
                    'type' => ilDBConstants::T_INTEGER,
                    'length' => 8,
                    'notnull' => true
                ],
                'last_login' => [
                    'type' => ilDBConstants::T_INTEGER,
                    'length' => 8,
                    'default' => null
                ],
                'login_attempts' => [
                    'type' => ilDBConstants::T_INTEGER,
                    'length' => 4,
                    'notnull' => true,
                    'default' => 0
                ],
                'last_password_change' => [
                    'type' => ilDBConstants::T_INTEGER,
                    'length' => 8,
                    'notnull' => true,
                    'default' => 0
                ]
            ]);

            $this->db->addPrimaryKey('usr_auth_data', ['usr_id']);
        }
    }
}
