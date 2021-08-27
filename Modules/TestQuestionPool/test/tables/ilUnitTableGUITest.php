<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilUnitTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilUnitTableGUITest extends assBaseTestCase
{
    private ilUnitTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $ctrl_mock = $this->createMock(ilCtrl::class);
        $ctrl_mock
            ->expects($this->any())
            ->method("getFormAction")
            ->willReturn("formAction");
        $this->setGlobalVariable("ilCtrl", $ctrl_mock);

        $this->testObj = new ilUnitTableGUI(
            $this->createMock(ilUnitConfigurationGUI::class),
            "showUnitsOfCategory",
            $this->createMock(assFormulaQuestionUnitCategory::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilUnitTableGUI::class, $this->testObj);
    }
}