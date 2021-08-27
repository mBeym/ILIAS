<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionPreviewSessionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionPreviewSessionTest extends assBaseTestCase
{
    private ilAssQuestionPreviewSession $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionPreviewSession(
            0, 0
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionPreviewSession::class, $this->testObj);
    }
}