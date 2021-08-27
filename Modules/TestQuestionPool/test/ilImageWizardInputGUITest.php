<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilImageWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilImageWizardInputGUITest extends assBaseTestCase
{
    private ilImageWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilImageWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilImageWizardInputGUI::class, $this->testObj);
    }
}