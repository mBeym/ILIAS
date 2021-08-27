<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacResultOfAnswerOfCurrentQuestionExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacResultOfAnswerOfCurrentQuestionExpressionTest extends assBaseTestCase
{
    private ilAssLacResultOfAnswerOfCurrentQuestionExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacResultOfAnswerOfCurrentQuestionExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacResultOfAnswerOfCurrentQuestionExpression::class, $this->testObj);
    }
}