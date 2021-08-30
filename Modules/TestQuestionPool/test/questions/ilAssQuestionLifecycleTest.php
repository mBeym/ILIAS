<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionLifecycleTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionLifecycleTest extends assBaseTestCase
{
    private ilAssQuestionLifecycle $testObj;

    /**
     * @throws ilTestQuestionPoolInvalidArgumentException
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = ilAssQuestionLifecycle::getInstance(ilAssQuestionLifecycle::DRAFT);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionLifecycle::class, $this->testObj);
    }
}