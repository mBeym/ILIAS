<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentsTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentsTableGUITest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignmentsTableGUI $testObj;

    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $this->testObj = new ilAssQuestionSkillAssignmentsTableGUI(
            $this->createMock(ilAssQuestionSkillAssignmentsGUI::class),
            "showSkillQuestionAssignments",
            $this->createMock(ilCtrl::class),
            $this->createMock(ilLanguage::class)
        );
    }

    public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignmentsTableGUI::class, $this->testObj);
    }
}