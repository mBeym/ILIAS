<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionProcessLockerDbTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionProcessLockerDbTest extends assBaseTestCase
{
    private ilAssQuestionProcessLockerDb $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionProcessLockerDb(
            $this->createMock(ilDBInterface::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionProcessLockerDb::class, $this->testObj);
    }
}