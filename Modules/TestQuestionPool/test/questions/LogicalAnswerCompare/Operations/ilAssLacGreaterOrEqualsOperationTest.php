<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacGreaterOrEqualsOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacGreaterOrEqualsOperationTest extends assBaseTestCase
{
    private ilAssLacGreaterOrEqualsOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacGreaterOrEqualsOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacGreaterOrEqualsOperation::class, $this->testObj);
    }
}