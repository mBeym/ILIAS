<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacAndOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacAndOperationTest extends assBaseTestCase
{
    private ilAssLacAndOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacAndOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacAndOperation::class, $this->testObj);
    }
}