<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentPropertyFormGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentPropertyFormGUITest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignmentPropertyFormGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_uiFactory();
        $this->addGlobal_uiRenderer();

        $this->testObj = new ilAssQuestionSkillAssignmentPropertyFormGUI(
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilAssQuestionSkillAssignmentsGUI::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignmentPropertyFormGUI::class, $this->testObj);
    }
}