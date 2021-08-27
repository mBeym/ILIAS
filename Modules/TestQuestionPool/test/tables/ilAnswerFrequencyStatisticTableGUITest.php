<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAnswerFrequencyStatisticTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAnswerFrequencyStatisticTableGUITest extends assBaseTestCase
{
    private ilAnswerFrequencyStatisticTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();
        $this->testObj = new ilAnswerFrequencyStatisticTableGUI(
            $this->createMock(ilTestCorrectionsGUI::class),
            "",
            $this->createMock(assQuestion::class),
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAnswerFrequencyStatisticTableGUI::class, $this->testObj);
    }
}