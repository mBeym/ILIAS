<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionProcessLockerNoneTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionProcessLockerNoneTest extends assBaseTestCase
{
    private ilAssQuestionProcessLockerNone $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionProcessLockerNone();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionProcessLockerNone::class, $this->testObj);
    }
}