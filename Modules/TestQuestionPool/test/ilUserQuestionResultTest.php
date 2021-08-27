<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilUserQuestionResultTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilUserQuestionResultTest extends assBaseTestCase
{
    private ilUserQuestionResult $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilUserQuestionResult(
            $this->createMock(iQuestionCondition::class),
            0, 0
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilUserQuestionResult::class, $this->testObj);
    }
}