<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilEssayKeywordWizardInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilEssayKeywordWizardInputGUITest extends assBaseTestCase
{
    private ilEssayKeywordWizardInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilEssayKeywordWizardInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilEssayKeywordWizardInputGUI::class, $this->testObj);
    }
}