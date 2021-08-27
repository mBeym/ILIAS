<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assMatchingQuestionExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assMatchingQuestionExportTest extends assBaseTestCase
{
    private assMatchingQuestionExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assMatchingQuestionExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assMatchingQuestionExport::class, $this->testObj);
    }
}