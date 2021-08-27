<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacUnsupportedOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacUnsupportedOperationTest extends assBaseTestCase
{
    private ilAssLacUnsupportedOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacUnsupportedOperation("+");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacUnsupportedOperation::class, $this->testObj);
    }
}