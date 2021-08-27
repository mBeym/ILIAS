<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintsGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintsGUITest extends assBaseTestCase
{
    private ilAssQuestionHintsGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $questionGui = $this->createMock(assQuestionGUI::class);
        $questionGui->object = $this->createMock(assQuestion::class);

        $this->testObj = new ilAssQuestionHintsGUI(
            $questionGui
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintsGUI::class, $this->testObj);
    }
}