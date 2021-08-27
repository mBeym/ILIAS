<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacAnswerOfCurrentQuestionExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacAnswerOfCurrentQuestionExpressionTest extends assBaseTestCase
{
    private ilAssLacAnswerOfCurrentQuestionExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacAnswerOfCurrentQuestionExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacAnswerOfCurrentQuestionExpression::class, $this->testObj);
    }
}