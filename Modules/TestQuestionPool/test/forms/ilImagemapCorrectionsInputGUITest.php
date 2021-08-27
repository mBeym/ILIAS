<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilImagemapCorrectionsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilImagemapCorrectionsInputGUITest extends assBaseTestCase
{
    private ilImagemapCorrectionsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilImagemapCorrectionsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilImagemapCorrectionsInputGUI::class, $this->testObj);
    }
}