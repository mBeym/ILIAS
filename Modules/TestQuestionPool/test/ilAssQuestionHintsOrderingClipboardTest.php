<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintsOrderingClipboardTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintsOrderingClipboardTest extends assBaseTestCase
{
    private ilAssQuestionHintsOrderingClipboard $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionHintsOrderingClipboard(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintsOrderingClipboard::class, $this->testObj);
    }
}