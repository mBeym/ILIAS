<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillUsagesTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillUsagesTableGUITest extends assBaseTestCase
{
    private ilAssQuestionSkillUsagesTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();
        $this->addGlobal_ilDB();


        $this->testObj = new ilAssQuestionSkillUsagesTableGUI(
            $this->createMock(ilCtrl::class),
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilDBInterface::class),
            0
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillUsagesTableGUI::class, $this->testObj);
    }
}