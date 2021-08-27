<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionPreviewHintTrackingTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionPreviewHintTrackingTest extends assBaseTestCase
{
    private ilAssQuestionPreviewHintTracking $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionPreviewHintTracking(
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilAssQuestionPreviewSession::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionPreviewHintTracking::class, $this->testObj);
    }
}