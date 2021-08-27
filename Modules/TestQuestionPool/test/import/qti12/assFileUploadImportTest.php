<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFileUploadImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFileUploadImportTest extends assBaseTestCase
{
    private assFileUploadImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assFileUploadImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFileUploadImport::class, $this->testObj);
    }
}