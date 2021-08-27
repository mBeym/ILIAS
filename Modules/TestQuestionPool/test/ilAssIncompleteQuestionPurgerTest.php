<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssIncompleteQuestionPurgerTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssIncompleteQuestionPurgerTest extends assBaseTestCase
{
    private ilAssIncompleteQuestionPurger $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssIncompleteQuestionPurger(
            $this->createMock(ilDBInterface::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssIncompleteQuestionPurger::class, $this->testObj);
    }
}