<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionAssignedSkillListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionAssignedSkillListTest extends assBaseTestCase
{
    private ilAssQuestionAssignedSkillList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionAssignedSkillList();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionAssignedSkillList::class, $this->testObj);
    }
}