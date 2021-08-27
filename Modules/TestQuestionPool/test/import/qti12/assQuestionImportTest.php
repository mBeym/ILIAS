<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assQuestionImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assQuestionImportTest extends assBaseTestCase
{
    private assQuestionImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assQuestionImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assQuestionImport::class, $this->testObj);
    }
}