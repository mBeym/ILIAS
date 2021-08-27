<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentImporterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentImporterTest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignmentImporter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilDB();

        $this->testObj = new ilAssQuestionSkillAssignmentImporter();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignmentImporter::class, $this->testObj);
    }
}