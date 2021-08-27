<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionInternalLinkSelectionTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionInternalLinkSelectionTableGUITest extends assBaseTestCase
{
    private ilQuestionInternalLinkSelectionTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $gui_mock = $this->createMock(assQuestionGUI::class);
        $gui_mock->object = $this->createMock(assQuestion::class);

        $ctr_mock = $this->createMock(ilCtrl::class);
        $ctr_mock
            ->expects($this->any())
            ->method("getFormAction")
            ->willReturn("test");
        $this->setGlobalVariable("ilCtrl", $ctr_mock);

        $this->testObj = new ilQuestionInternalLinkSelectionTableGUI(
            $gui_mock,
            "cancelExplorer"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionInternalLinkSelectionTableGUI::class, $this->testObj);
    }
}