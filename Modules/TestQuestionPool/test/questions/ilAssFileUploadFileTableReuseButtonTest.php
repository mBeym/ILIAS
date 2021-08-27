<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssFileUploadFileTableReuseButtonTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssFileUploadFileTableReuseButtonTest extends assBaseTestCase
{
    private ilAssFileUploadFileTableReuseButton $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssFileUploadFileTableReuseButton(
            "button"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssFileUploadFileTableReuseButton::class, $this->testObj);
    }
}