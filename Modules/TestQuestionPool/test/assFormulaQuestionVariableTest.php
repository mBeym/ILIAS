<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFormulaQuestionVariableTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFormulaQuestionVariableTest extends assBaseTestCase
{
    private assFormulaQuestionVariable $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $newtonmetre = new assFormulaQuestionUnit();
        $newtonmetre->initFormArray([
            'unit_id' => 3,
            'category' => 1,
            'sequence' => 3,
            'unit' => 'Newton Metre',
            'factor' => 1,
            'baseunit_fi' => -1,
            'baseunit_title' => ''
        ]);
        $this->testObj = new assFormulaQuestionVariable('$v1', 1, 20, $newtonmetre, 1);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFormulaQuestionVariable::class, $this->testObj);
    }
}