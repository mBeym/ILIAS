<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssFileUploadFileTableDeleteButtonTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssFileUploadFileTableDeleteButtonTest extends assBaseTestCase
{
    private ilAssFileUploadFileTableDeleteButton $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssFileUploadFileTableDeleteButton(
            "button"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssFileUploadFileTableDeleteButton::class, $this->testObj);
    }
}