<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacEqualsOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacEqualsOperationTest extends assBaseTestCase
{
    private ilAssLacEqualsOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacEqualsOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacEqualsOperation::class, $this->testObj);
    }
}