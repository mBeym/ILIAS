<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentExporterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentExporterTest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignmentExporter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSkillAssignmentExporter();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignmentExporter::class, $this->testObj);
    }
}