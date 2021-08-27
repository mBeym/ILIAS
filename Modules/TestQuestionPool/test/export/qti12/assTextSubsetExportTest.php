<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assTextSubsetExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assTextSubsetExportTest extends assBaseTestCase
{
    private assTextSubsetExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assTextSubsetExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assTextSubsetExport::class, $this->testObj);
    }
}