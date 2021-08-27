<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assQuestionExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assQuestionExportTest extends assBaseTestCase
{
    private assQuestionExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assQuestionExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assQuestionExport::class, $this->testObj);
    }
}