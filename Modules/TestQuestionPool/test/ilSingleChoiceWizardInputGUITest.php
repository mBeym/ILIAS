<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilSingleChoiceWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilSingleChoiceWizardInputGUITest extends assBaseTestCase
{
    private ilSingleChoiceWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilSingleChoiceWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilSingleChoiceWizardInputGUI::class, $this->testObj);
    }
}