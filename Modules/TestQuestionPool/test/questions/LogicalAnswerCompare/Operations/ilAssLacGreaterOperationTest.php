<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacGreaterOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacGreaterOperationTest extends assBaseTestCase
{
    private ilAssLacGreaterOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacGreaterOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacGreaterOperation::class, $this->testObj);
    }
}