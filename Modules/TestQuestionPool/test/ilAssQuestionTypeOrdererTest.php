<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionTypeOrdererTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionTypeOrdererTest extends assBaseTestCase
{
    private ilAssQuestionTypeOrderer $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionTypeOrderer(
            ["test", "abcd"]
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionTypeOrderer::class, $this->testObj);
    }
}