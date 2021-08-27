<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAnswerWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAnswerWizardInputGUITest extends assBaseTestCase
{
    private ilAnswerWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAnswerWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAnswerWizardInputGUI::class, $this->testObj);
    }
}