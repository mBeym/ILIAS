<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionCumulatedStatisticsTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionCumulatedStatisticsTableGUITest extends assBaseTestCase
{
    private ilQuestionCumulatedStatisticsTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();
        $this->addGlobal_ilAccess();


        $this->testObj = new ilQuestionCumulatedStatisticsTableGUI(
            $this->createMock(ilUnitConfigurationGUI::class),
            "assessment",
            '',
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionCumulatedStatisticsTableGUI::class, $this->testObj);
    }
}