<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFlashQuestionExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFlashQuestionExportTest extends assBaseTestCase
{
    private assFlashQuestionExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assFlashQuestionExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFlashQuestionExport::class, $this->testObj);
    }
}