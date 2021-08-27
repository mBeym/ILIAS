<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacNotEqualsOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacNotEqualsOperationTest extends assBaseTestCase
{
    private ilAssLacNotEqualsOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacNotEqualsOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacNotEqualsOperation::class, $this->testObj);
    }
}