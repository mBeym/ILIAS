<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assKprimChoiceGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assKprimChoiceGUITest extends assBaseTestCase
{
    private assKprimChoiceGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilias();
        $this->addGlobal_ilDB();

        $ctrl_mock = $this->createMock(ilCtrl::class);
        $ctrl_mock
            ->expects($this->any())
            ->method("getFormAction")
            ->willReturn("formAction");
        $this->setGlobalVariable("ilCtrl", $ctrl_mock);

        $this->testObj = new assKprimChoiceGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assKprimChoiceGUI::class, $this->testObj);
    }
}