<?php

class ilForumUpdateSteps implements ilDatabaseUpdateSteps
{
    protected ilDBInterface $db;

    public function prepare(ilDBInterface $db) : void
    {
        $this->db = $db;
    }

    public function step_1(ilDBInterface $db) : void
    {
        if ($db->tableExists("frm_settings")) {
            $db->addTableColumn("frm_settings", "activation_type", [
                "type" => "integer",
                "length" => "1",
                "default" => 0,
                "notnull" => true
            ]);
        }
    }
}