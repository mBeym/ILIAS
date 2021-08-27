<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilTestQuestionPoolExporterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilTestQuestionPoolExporterTest extends assBaseTestCase
{
    private ilTestQuestionPoolExporter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilTestQuestionPoolExporter();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilTestQuestionPoolExporter::class, $this->testObj);
    }
}