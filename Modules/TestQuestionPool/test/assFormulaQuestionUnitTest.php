<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFormulaQuestionUnitTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFormulaQuestionUnitTest extends assBaseTestCase
{
    private assFormulaQuestionUnit $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assFormulaQuestionUnit();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFormulaQuestionUnit::class, $this->testObj);
    }
}