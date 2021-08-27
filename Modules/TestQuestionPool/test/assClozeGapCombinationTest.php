<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assClozeGapCombinationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assClozeGapCombinationTest extends assBaseTestCase
{
    private assClozeGapCombination $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assClozeGapCombination();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assClozeGapCombination::class, $this->testObj);
    }
}