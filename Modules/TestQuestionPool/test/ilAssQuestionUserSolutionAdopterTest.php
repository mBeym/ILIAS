<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionUserSolutionAdopterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionUserSolutionAdopterTest extends assBaseTestCase
{
    private ilAssQuestionUserSolutionAdopter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionUserSolutionAdopter(
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilSetting::class),
            false
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionUserSolutionAdopter::class, $this->testObj);
    }
}