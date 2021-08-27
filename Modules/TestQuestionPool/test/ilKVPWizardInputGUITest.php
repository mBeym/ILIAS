<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilKVPWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilKVPWizardInputGUITest extends assBaseTestCase
{
    private ilKVPWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilKVPWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilKVPWizardInputGUI::class, $this->testObj);
    }
}