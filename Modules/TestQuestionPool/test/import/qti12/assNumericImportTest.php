<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assNumericImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assNumericImportTest extends assBaseTestCase
{
    private assNumericImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assNumericImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assNumericImport::class, $this->testObj);
    }
}