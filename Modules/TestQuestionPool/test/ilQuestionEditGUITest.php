<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionEditGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionEditGUITest extends assBaseTestCase
{
    private ilQuestionEditGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilObjDataCache();
        $this->addGlobal_ilias();
        $this->addGlobal_ilDB();
        $this->addGlobal_ilPluginAdmin();

        $_GET["qpool_ref_id"] = 2;
        $_GET["q_id"] = 5;
        $_GET["q_type"] = "test";
        $this->testObj = new ilQuestionEditGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionEditGUI::class, $this->testObj);
    }
}