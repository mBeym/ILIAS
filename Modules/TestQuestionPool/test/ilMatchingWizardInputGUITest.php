<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilMatchingWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilMatchingWizardInputGUITest extends assBaseTestCase
{
    private ilMatchingWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilMatchingWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilMatchingWizardInputGUI::class, $this->testObj);
    }
}