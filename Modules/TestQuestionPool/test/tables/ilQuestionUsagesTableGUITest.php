<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionUsagesTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionUsagesTableGUITest extends assBaseTestCase
{
    private ilQuestionUsagesTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();
        $this->addGlobal_ilDB();
        $this->addGlobal_tree();


        $this->testObj = new ilQuestionUsagesTableGUI(
            $this->createMock(ilUnitConfigurationGUI::class),
            "test",
            "",
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionUsagesTableGUI::class, $this->testObj);
    }
}