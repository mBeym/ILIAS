<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSolutionComparisonExpressionListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSolutionComparisonExpressionListTest extends assBaseTestCase
{
    private ilAssQuestionSolutionComparisonExpressionList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSolutionComparisonExpressionList(
            $this->createMock(ilDBInterface::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSolutionComparisonExpressionList::class, $this->testObj);
    }
}