<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionLomLifecycleTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionLomLifecycleTest extends assBaseTestCase
{
    private ilAssQuestionLomLifecycle $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionLomLifecycle();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionLomLifecycle::class, $this->testObj);
    }
}