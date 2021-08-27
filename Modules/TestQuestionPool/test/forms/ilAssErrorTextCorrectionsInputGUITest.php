<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssErrorTextCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssErrorTextCorrectionsInputGUITest extends assBaseTestCase
{
    private ilAssErrorTextCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssErrorTextCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssErrorTextCorrectionsInputGUI::class, $this->testObj);
    }
}