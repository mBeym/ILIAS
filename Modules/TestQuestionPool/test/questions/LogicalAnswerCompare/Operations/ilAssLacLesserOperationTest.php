<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacLesserOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacLesserOperationTest extends assBaseTestCase
{
    private ilAssLacLesserOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacLesserOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacLesserOperation::class, $this->testObj);
    }
}