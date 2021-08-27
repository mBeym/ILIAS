<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assImagemapQuestionImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assImagemapQuestionImportTest extends assBaseTestCase
{
    private assImagemapQuestionImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assImagemapQuestionImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assImagemapQuestionImport::class, $this->testObj);
    }
}