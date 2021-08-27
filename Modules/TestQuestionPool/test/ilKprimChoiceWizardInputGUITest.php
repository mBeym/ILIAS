<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilKprimChoiceWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilKprimChoiceWizardInputGUITest extends assBaseTestCase
{
    private ilKprimChoiceWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilKprimChoiceWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilKprimChoiceWizardInputGUI::class, $this->testObj);
    }
}