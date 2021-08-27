<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assErrorTextImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assErrorTextImportTest extends assBaseTestCase
{
    private assErrorTextImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assErrorTextImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assErrorTextImport::class, $this->testObj);
    }
}