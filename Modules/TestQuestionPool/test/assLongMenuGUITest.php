<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assLongMenuGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assLongMenuGUITest extends assBaseTestCase
{
    private assLongMenuGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilias();
        $this->addGlobal_ilDB();
        $this->addGlobal_rbacsystem();
        $this->addGlobal_ilTabs();

        $this->testObj = new assLongMenuGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assLongMenuGUI::class, $this->testObj);
    }
}