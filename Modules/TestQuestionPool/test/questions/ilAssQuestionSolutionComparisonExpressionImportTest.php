<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSolutionComparisonExpressionImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSolutionComparisonExpressionImportTest extends assBaseTestCase
{
    private ilAssQuestionSolutionComparisonExpressionImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSolutionComparisonExpressionImport();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSolutionComparisonExpressionImport::class, $this->testObj);
    }
}