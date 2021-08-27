<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentsGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentsGUITest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignmentsGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSkillAssignmentsGUI(
            $this->createMock(ilCtrl::class),
            $this->createMock(ilAccessHandler::class),
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilDBInterface::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignmentsGUI::class, $this->testObj);
    }
}