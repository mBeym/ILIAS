<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilMultipleChoiceWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilMultipleChoiceWizardInputGUITest extends assBaseTestCase
{
    private ilMultipleChoiceWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilMultipleChoiceWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilMultipleChoiceWizardInputGUI::class, $this->testObj);
    }
}