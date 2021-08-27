<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilKprimChoiceAnswerFreqStatTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilKprimChoiceAnswerFreqStatTableGUITest extends assBaseTestCase
{
    private ilKprimChoiceAnswerFreqStatTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $this->testObj = new ilKprimChoiceAnswerFreqStatTableGUI(
            $this->createMock(ilTestCorrectionsGUI::class),
            "showAnswerStatistic",
            $this->createMock(assQuestion::class),
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilKprimChoiceAnswerFreqStatTableGUI::class, $this->testObj);
    }
}