<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssFileUploadUploadsExporterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssFileUploadUploadsExporterTest extends assBaseTestCase
{
    private ilAssFileUploadUploadsExporter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssFileUploadUploadsExporter(
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssFileUploadUploadsExporter::class, $this->testObj);
    }
}