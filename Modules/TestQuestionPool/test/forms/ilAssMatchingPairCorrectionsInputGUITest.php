<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssMatchingPairCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssMatchingPairCorrectionsInputGUITest extends assBaseTestCase
{
    private ilAssMatchingPairCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssMatchingPairCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssMatchingPairCorrectionsInputGUI::class, $this->testObj);
    }
}