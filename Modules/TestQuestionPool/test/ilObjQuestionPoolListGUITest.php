<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilObjQuestionPoolListGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilObjQuestionPoolListGUITest extends assBaseTestCase
{
    private ilObjQuestionPoolListGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilAccess();
        $this->addGlobal_ilUser();
        $this->addGlobal_objDefinition();
        $this->addGlobal_tree();
        $this->addGlobal_ilSetting();
        $this->addGlobal_rbacsystem();
        $this->addGlobal_filesystem();
        $this->addGlobal_upload();
        $this->addGlobal_ilDB();
        $this->addGlobal_ilLog();
        $this->addGlobal_http();


        $this->testObj = new ilObjQuestionPoolListGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilObjQuestionPoolListGUI::class, $this->testObj);
    }
}