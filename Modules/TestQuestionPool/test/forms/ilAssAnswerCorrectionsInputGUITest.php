<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssAnswerCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssAnswerCorrectionsInputGUITest extends assBaseTestCase
{
    private ilAssAnswerCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssAnswerCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssAnswerCorrectionsInputGUI::class, $this->testObj);
    }
}