<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilTestQuestionPoolImporterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilTestQuestionPoolImporterTest extends assBaseTestCase
{
    private ilTestQuestionPoolImporter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilTestQuestionPoolImporter();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilTestQuestionPoolImporter::class, $this->testObj);
    }
}