<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilForumPageUpdateSteps
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilForumPageUpdateSteps implements ilDatabaseUpdateSteps
{
    protected ilDBInterface $db;

    public function prepare(ilDBInterface $db) : void
    {
        $this->db = $db;
    }

    public function step_1(ilDBInterface $db) : void
    {
        $db->manipulate("UPDATE object_data SET offline=1 WHERE type='frm'");
    }
}