<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionProcessLockerFactoryTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionProcessLockerFactoryTest extends assBaseTestCase
{
    private ilAssQuestionProcessLockerFactory $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionProcessLockerFactory(
            $this->createMock(ilSetting::class),
            $this->createMock(ilDBInterface::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionProcessLockerFactory::class, $this->testObj);
    }
}