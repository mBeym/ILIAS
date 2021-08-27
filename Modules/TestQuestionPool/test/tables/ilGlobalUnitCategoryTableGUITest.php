<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilGlobalUnitCategoryTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilGlobalUnitCategoryTableGUITest extends assBaseTestCase
{
    private ilGlobalUnitCategoryTableGUI $testObj;
    
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

        $this->testObj = new ilGlobalUnitCategoryTableGUI(
            $this->createMock(ilUnitConfigurationGUI::class),
            "show"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilGlobalUnitCategoryTableGUI::class, $this->testObj);
    }
}