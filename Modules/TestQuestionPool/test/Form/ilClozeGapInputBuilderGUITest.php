<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilClozeGapInputBuilderGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilClozeGapInputBuilderGUITest extends assBaseTestCase
{
    private ilClozeGapInputBuilderGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilClozeGapInputBuilderGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilClozeGapInputBuilderGUI::class, $this->testObj);
    }
}