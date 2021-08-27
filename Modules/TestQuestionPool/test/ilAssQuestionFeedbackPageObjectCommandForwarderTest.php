<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionFeedbackPageObjectCommandForwarderTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionFeedbackPageObjectCommandForwarderTest extends assBaseTestCase
{
    private ilAssQuestionFeedbackPageObjectCommandForwarder $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $db_mock = $this->createMock(ilDBInterface::class);
        $db_mock->expects($this->any())
            ->method("fetchAssoc")
            ->willReturn(["cnt" => 1]);

        $_GET['feedback_id'] = 2;
        $_GET['feedback_type'] = "random_type";

        $assQuestion_mock = $this->createMock(assQuestion::class);
        $assQuestion_mock->feedbackOBJ = new ilAssNumericFeedback(
            $this->createMock(assQuestion::class),
            $this->createMock(ilCtrl::class),
            $db_mock,
            $this->createMock(ilLanguage::class)
        );

        $this->testObj = new ilAssQuestionFeedbackPageObjectCommandForwarder(
            $assQuestion_mock,
            $this->createMock(ilCtrl::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionFeedbackPageObjectCommandForwarder::class, $this->testObj);
    }
}