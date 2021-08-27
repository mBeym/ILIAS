<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacExceptionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacExceptionTest extends assBaseTestCase
{
    private ilAssLacException $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacException(
            "random message"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacException::class, $this->testObj);
    }
}