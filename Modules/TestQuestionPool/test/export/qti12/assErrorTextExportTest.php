<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assErrorTextExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assErrorTextExportTest extends assBaseTestCase
{
    private assErrorTextExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assErrorTextExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assErrorTextExport::class, $this->testObj);
    }
}