<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFormulaQuestionResultTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFormulaQuestionResultTest extends assBaseTestCase
{
    private assFormulaQuestionResult $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $newtoncentimeter = new assFormulaQuestionUnit();
        $newtoncentimeter->initFormArray([
            'unit_id' => 4,
            'category' => 1,
            'sequence' => 4,
            'unit' => 'Newton Centimeter',
            'factor' => 0.01,
            'baseunit_fi' => 3,
            'baseunit_title' => 'Newton Metre'
        ]);

        $this->testObj = new assFormulaQuestionResult(
            '$r1',
            0,
            0,
            0,
            $newtoncentimeter,
            '$v1 * $v2',
            5,
            2,
            true,
            33,
            34,
            33,
            assFormulaQuestionResult::RESULT_DEC
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFormulaQuestionResult::class, $this->testObj);
    }
}