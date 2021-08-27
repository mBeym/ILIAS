<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilSuggestedSolutionInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilSuggestedSolutionInputGUITest extends assBaseTestCase
{
    private ilSuggestedSolutionInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilSuggestedSolutionInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilSuggestedSolutionInputGUI::class, $this->testObj);
    }
}