<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacResultOfAnswerOfQuestionExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacResultOfAnswerOfQuestionExpressionTest extends assBaseTestCase
{
    private ilAssLacResultOfAnswerOfQuestionExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacResultOfAnswerOfQuestionExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacResultOfAnswerOfQuestionExpression::class, $this->testObj);
    }
}