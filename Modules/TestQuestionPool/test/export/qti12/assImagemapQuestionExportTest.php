<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assImagemapQuestionExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assImagemapQuestionExportTest extends assBaseTestCase
{
    private assImagemapQuestionExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assImagemapQuestionExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assImagemapQuestionExport::class, $this->testObj);
    }
}