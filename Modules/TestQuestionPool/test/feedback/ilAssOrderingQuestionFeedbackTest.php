<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingQuestionFeedbackTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingQuestionFeedbackTest extends assBaseTestCase
{
    private ilAssOrderingQuestionFeedback $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingQuestionFeedback(
            $this->createMock(assQuestion::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingQuestionFeedback::class, $this->testObj);
    }
}