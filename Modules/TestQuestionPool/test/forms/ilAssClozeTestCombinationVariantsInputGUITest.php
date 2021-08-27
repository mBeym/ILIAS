<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssClozeTestCombinationVariantsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssClozeTestCombinationVariantsInputGUITest extends assBaseTestCase
{
    private ilAssClozeTestCombinationVariantsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssClozeTestCombinationVariantsInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssClozeTestCombinationVariantsInputGUI::class, $this->testObj);
    }
}