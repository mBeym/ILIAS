<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFlashQuestionImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFlashQuestionImportTest extends assBaseTestCase
{
    private assFlashQuestionImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assFlashQuestionImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFlashQuestionImport::class, $this->testObj);
    }
}