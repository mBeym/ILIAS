<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilLocalUnitCategoryTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilLocalUnitCategoryTableGUITest extends assBaseTestCase
{
    private ilLocalUnitCategoryTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $ctr_mock = $this->createMock(ilCtrl::class);
        $ctr_mock
            ->expects($this->any())
            ->method("getFormAction")
            ->willReturn("test");
        $this->setGlobalVariable("ilCtrl", $ctr_mock);

        $this->testObj = new ilLocalUnitCategoryTableGUI(
            $this->createMock(ilUnitConfigurationGUI::class),
            "showGlobalUnitCategories"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilLocalUnitCategoryTableGUI::class, $this->testObj);
    }
}