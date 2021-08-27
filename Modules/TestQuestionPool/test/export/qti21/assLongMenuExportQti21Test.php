<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assLongMenuExportQti21Test
 * @author Marvin Beym <mbeym@databay.de>
 */
class assLongMenuExportQti21Test extends assBaseTestCase
{
    private assLongMenuExportQti21 $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assLongMenuExportQti21(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assLongMenuExportQti21::class, $this->testObj);
    }
}