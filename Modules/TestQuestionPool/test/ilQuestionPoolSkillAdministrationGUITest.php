<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionPoolSkillAdministrationGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionPoolSkillAdministrationGUITest extends assBaseTestCase
{
    private ilQuestionPoolSkillAdministrationGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilQuestionPoolSkillAdministrationGUI(
            $this->getIliasMock(),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilAccessHandler::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilPluginAdmin::class),
            $this->createMock(ilObjQuestionPool::class),
            0
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionPoolSkillAdministrationGUI::class, $this->testObj);
    }
}