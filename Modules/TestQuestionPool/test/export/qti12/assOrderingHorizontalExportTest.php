<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assOrderingHorizontalExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assOrderingHorizontalExportTest extends assBaseTestCase
{
    private assOrderingHorizontalExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assOrderingHorizontalExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assOrderingHorizontalExport::class, $this->testObj);
    }
}