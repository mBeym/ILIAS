<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionAuthoringFormGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionAuthoringFormGUITest extends assBaseTestCase
{
    private ilAssQuestionAuthoringFormGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionAuthoringFormGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionAuthoringFormGUI::class, $this->testObj);
    }
}