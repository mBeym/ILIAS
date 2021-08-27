<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilErrorTextWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilErrorTextWizardInputGUITest extends assBaseTestCase
{
    private ilErrorTextWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilErrorTextWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilErrorTextWizardInputGUI::class, $this->testObj);
    }
}