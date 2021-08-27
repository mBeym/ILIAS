<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentTest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignment $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSkillAssignment(
            $this->createMock(ilDBInterface::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignment::class, $this->testObj);
    }
}