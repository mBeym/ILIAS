<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAddAnswerModalFormGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAddAnswerModalFormGUITest extends assBaseTestCase
{
    private ilAddAnswerModalFormGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAddAnswerModalFormGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAddAnswerModalFormGUI::class, $this->testObj);
    }
}