<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacExpressionNotSupportedByQuestionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacExpressionNotSupportedByQuestionTest extends assBaseTestCase
{
    private ilAssLacExpressionNotSupportedByQuestion $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacExpressionNotSupportedByQuestion("expression", 5);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacExpressionNotSupportedByQuestion::class, $this->testObj);
    }
}