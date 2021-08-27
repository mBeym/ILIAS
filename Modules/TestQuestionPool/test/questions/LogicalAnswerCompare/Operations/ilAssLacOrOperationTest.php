<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacOrOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacOrOperationTest extends assBaseTestCase
{
    private ilAssLacOrOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacOrOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacOrOperation::class, $this->testObj);
    }
}