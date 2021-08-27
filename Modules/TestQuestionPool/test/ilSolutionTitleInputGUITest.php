<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilSolutionTitleInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilSolutionTitleInputGUITest extends assBaseTestCase
{
    private ilSolutionTitleInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilSolutionTitleInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilSolutionTitleInputGUI::class, $this->testObj);
    }
}