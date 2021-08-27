<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilMatchingQuestionAnswerFreqStatTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilMatchingQuestionAnswerFreqStatTableGUITest extends assBaseTestCase
{
    private ilMatchingQuestionAnswerFreqStatTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $this->testObj = new ilMatchingQuestionAnswerFreqStatTableGUI(
            $this->createMock(ilTestCorrectionsGUI::class),
            "showAnswerStatistic",
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilMatchingQuestionAnswerFreqStatTableGUI::class, $this->testObj);
    }
}