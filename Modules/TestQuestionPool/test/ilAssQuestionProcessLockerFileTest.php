<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionProcessLockerFileTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionProcessLockerFileTest extends assBaseTestCase
{
    private ilAssQuestionProcessLockerFile $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionProcessLockerFile(
            $this->createMock(ilAssQuestionProcessLockFileStorage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionProcessLockerFile::class, $this->testObj);
    }
}