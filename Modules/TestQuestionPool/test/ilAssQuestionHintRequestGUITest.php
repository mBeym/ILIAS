<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintRequestGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintRequestGUITest extends assBaseTestCase
{
    private ilAssQuestionHintRequestGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionHintRequestGUI(
            $this->createMock(ilAssQuestionPreviewGUI::class),
            "show",
            $this->createMock(assQuestionGUI::class),
            $this->createMock(ilAssQuestionPreviewHintTracking::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintRequestGUI::class, $this->testObj);
    }
}