<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionFeedbackEditingGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionFeedbackEditingGUITest extends assBaseTestCase
{
    private ilAssQuestionFeedbackEditingGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $assQuestionGui = $this->createMock(assQuestionGUI::class);
        $assQuestionGui->object = $this->createMock(assQuestion::class);
        $assQuestionGui->object->feedbackOBJ = new ilAssNumericFeedback(
            $this->createMock(assQuestion::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilLanguage::class)
        );

        $this->testObj = new ilAssQuestionFeedbackEditingGUI(
            $assQuestionGui,
            $this->createMock(ilCtrl::class),
            $this->createMock(ilAccessHandler::class),
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionFeedbackEditingGUI::class, $this->testObj);
    }
}