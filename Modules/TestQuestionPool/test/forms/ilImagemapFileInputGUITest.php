<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilImagemapFileInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilImagemapFileInputGUITest extends assBaseTestCase
{
    private ilImagemapFileInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilImagemapFileInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilImagemapFileInputGUI::class, $this->testObj);
    }
}