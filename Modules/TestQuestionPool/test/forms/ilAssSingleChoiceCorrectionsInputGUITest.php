<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssSingleChoiceCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssSingleChoiceCorrectionsInputGUITest extends assBaseTestCase
{
    private ilAssSingleChoiceCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssSingleChoiceCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssSingleChoiceCorrectionsInputGUI::class, $this->testObj);
    }
}