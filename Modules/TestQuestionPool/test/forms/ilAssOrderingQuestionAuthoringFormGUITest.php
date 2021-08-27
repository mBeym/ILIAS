<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingQuestionAuthoringFormGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingQuestionAuthoringFormGUITest extends assBaseTestCase
{
    private ilAssOrderingQuestionAuthoringFormGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingQuestionAuthoringFormGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingQuestionAuthoringFormGUI::class, $this->testObj);
    }
}