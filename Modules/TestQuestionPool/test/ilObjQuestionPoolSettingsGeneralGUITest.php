<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilObjQuestionPoolSettingsGeneralGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilObjQuestionPoolSettingsGeneralGUITest extends assBaseTestCase
{
    private ilObjQuestionPoolSettingsGeneralGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilObjQuestionPoolSettingsGeneralGUI(
            $this->createMock(ilCtrl::class),
            $this->createMock(ilAccessHandler::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilObjQuestionPoolGUI::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilObjQuestionPoolSettingsGeneralGUI::class, $this->testObj);
    }
}