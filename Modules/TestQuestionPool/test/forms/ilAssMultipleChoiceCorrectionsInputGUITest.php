<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssMultipleChoiceCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssMultipleChoiceCorrectionsInputGUITest extends assBaseTestCase
{
    private ilAssMultipleChoiceCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssMultipleChoiceCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssMultipleChoiceCorrectionsInputGUI::class, $this->testObj);
    }
}