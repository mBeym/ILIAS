<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintGUITest extends assBaseTestCase
{
    private ilAssQuestionHintGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionHintGUI(
            $this->createMock(assQuestionGUI::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintGUI::class, $this->testObj);
    }
}