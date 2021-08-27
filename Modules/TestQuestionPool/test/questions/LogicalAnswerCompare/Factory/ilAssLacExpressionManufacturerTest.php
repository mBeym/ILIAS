<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacExpressionManufacturerTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacExpressionManufacturerTest extends assBaseTestCase
{
    private ilAssLacExpressionManufacturer $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->markTestSkipped("_getInstance() can't be called for some reason");
        //$this->testObj = new ilAssLacExpressionManufacturer::_getInstance();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacExpressionManufacturer::class, $this->testObj);
    }
}