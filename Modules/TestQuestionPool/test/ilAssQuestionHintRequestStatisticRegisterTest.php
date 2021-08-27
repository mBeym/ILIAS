<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintRequestStatisticRegisterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintRequestStatisticRegisterTest extends assBaseTestCase
{
    private ilAssQuestionHintRequestStatisticRegister $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionHintRequestStatisticRegister();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintRequestStatisticRegister::class, $this->testObj);
    }
}