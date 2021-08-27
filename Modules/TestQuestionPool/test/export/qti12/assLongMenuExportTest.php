<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assLongMenuExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assLongMenuExportTest extends assBaseTestCase
{
    private assLongMenuExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assLongMenuExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assLongMenuExport::class, $this->testObj);
    }
}