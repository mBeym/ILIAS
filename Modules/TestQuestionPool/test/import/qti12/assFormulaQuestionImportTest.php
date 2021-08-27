<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFormulaQuestionImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFormulaQuestionImportTest extends assBaseTestCase
{
    private assFormulaQuestionImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assFormulaQuestionImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFormulaQuestionImport::class, $this->testObj);
    }
}