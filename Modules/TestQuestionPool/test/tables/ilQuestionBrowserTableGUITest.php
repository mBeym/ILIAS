<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionBrowserTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionBrowserTableGUITest extends assBaseTestCase
{
    private ilQuestionBrowserTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();
        $this->addGlobal_ilDB();
        $this->addGlobal_rbacreview();
        $this->addGlobal_ilUser();

        $gui_mock = $this->createMock(ilObjQuestionPoolGUI::class);
        $gui_mock->object = $this->createMock(ilObjQuestionPool::class);

        $lng_mock = $this->createMock(ilLanguage::class);
        $lng_mock
            ->expects($this->any())
            ->method("txt")
            ->willReturn("testString");
        $this->setGlobalVariable("lng", $lng_mock);

        $ctr_mock = $this->createMock(ilCtrl::class);
        $ctr_mock
            ->expects($this->any())
            ->method("getFormAction")
            ->willReturn("test");
        $this->setGlobalVariable("ilCtrl", $ctr_mock);

        $this->testObj = new ilQuestionBrowserTableGUI(
            $gui_mock,
            "questions"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionBrowserTableGUI::class, $this->testObj);
    }
}