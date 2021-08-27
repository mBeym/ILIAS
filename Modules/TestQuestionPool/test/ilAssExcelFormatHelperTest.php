<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssExcelFormatHelperTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssExcelFormatHelperTest extends assBaseTestCase
{
    private ilAssExcelFormatHelper $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssExcelFormatHelper();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssExcelFormatHelper::class, $this->testObj);
    }
}