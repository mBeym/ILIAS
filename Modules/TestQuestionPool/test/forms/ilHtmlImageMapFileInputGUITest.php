<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilHtmlImageMapFileInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilHtmlImageMapFileInputGUITest extends assBaseTestCase
{
    private ilHtmlImageMapFileInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilHtmlImageMapFileInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilHtmlImageMapFileInputGUI::class, $this->testObj);
    }
}