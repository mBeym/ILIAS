<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilSuggestedSolutionSelectorGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilSuggestedSolutionSelectorGUITest extends assBaseTestCase
{
    private ilSuggestedSolutionSelectorGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilSuggestedSolutionSelectorGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilSuggestedSolutionSelectorGUI::class, $this->testObj);
    }
}