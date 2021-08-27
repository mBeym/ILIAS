<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assLongMenuImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assLongMenuImportTest extends assBaseTestCase
{
    private assLongMenuImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assLongMenuImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assLongMenuImport::class, $this->testObj);
    }
}