<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacConditionParserExceptionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacConditionParserExceptionTest extends assBaseTestCase
{
    private ilAssLacConditionParserException $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacConditionParserException(0);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacConditionParserException::class, $this->testObj);
    }
}