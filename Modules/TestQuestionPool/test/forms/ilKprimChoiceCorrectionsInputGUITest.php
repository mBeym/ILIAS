<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilKprimChoiceCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilKprimChoiceCorrectionsInputGUITest extends assBaseTestCase
{
    private ilKprimChoiceCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilKprimChoiceCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilKprimChoiceCorrectionsInputGUI::class, $this->testObj);
    }
}