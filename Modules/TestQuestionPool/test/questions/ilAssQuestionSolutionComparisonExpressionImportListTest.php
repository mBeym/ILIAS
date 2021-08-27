<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSolutionComparisonExpressionImportListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSolutionComparisonExpressionImportListTest extends assBaseTestCase
{
    private ilAssQuestionSolutionComparisonExpressionImportList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSolutionComparisonExpressionImportList();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSolutionComparisonExpressionImportList::class, $this->testObj);
    }
}