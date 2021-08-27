<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacQuestionNotReachableTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacQuestionNotReachableTest extends assBaseTestCase
{
    private ilAssLacQuestionNotReachable $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacQuestionNotReachable(0);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacQuestionNotReachable::class, $this->testObj);
    }
}