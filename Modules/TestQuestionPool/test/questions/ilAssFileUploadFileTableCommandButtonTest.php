<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssFileUploadFileTableCommandButtonTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssFileUploadFileTableCommandButtonTest extends assBaseTestCase
{
    private ilAssFileUploadFileTableCommandButton $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssFileUploadFileTableCommandButton(
            "button"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssFileUploadFileTableCommandButton::class, $this->testObj);
    }
}