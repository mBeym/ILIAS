<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFormulaQuestionUnitCategoryTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFormulaQuestionUnitCategoryTest extends assBaseTestCase
{
    private assFormulaQuestionUnitCategory $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assFormulaQuestionUnitCategory();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFormulaQuestionUnitCategory::class, $this->testObj);
    }
}