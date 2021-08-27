<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assImagemapQuestionGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assImagemapQuestionGUITest extends assBaseTestCase
{
    private assImagemapQuestionGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilias();
        $this->addGlobal_ilDB();

        $this->testObj = new assImagemapQuestionGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assImagemapQuestionGUI::class, $this->testObj);
    }
}