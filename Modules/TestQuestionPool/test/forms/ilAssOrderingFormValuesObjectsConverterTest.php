<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingFormValuesObjectsConverterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingFormValuesObjectsConverterTest extends assBaseTestCase
{
    private ilAssOrderingFormValuesObjectsConverter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingFormValuesObjectsConverter();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingFormValuesObjectsConverter::class, $this->testObj);
    }
}