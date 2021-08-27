<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssMatchingQuestionFeedbackTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssMatchingQuestionFeedbackTest extends assBaseTestCase
{
    private ilAssMatchingQuestionFeedback $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssMatchingQuestionFeedback(
            $this->createMock(assQuestion::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssMatchingQuestionFeedback::class, $this->testObj);
    }
}