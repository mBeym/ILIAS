<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assOrderingHorizontalImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assOrderingHorizontalImportTest extends assBaseTestCase
{
    private assOrderingHorizontalImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assOrderingHorizontalImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assOrderingHorizontalImport::class, $this->testObj);
    }
}