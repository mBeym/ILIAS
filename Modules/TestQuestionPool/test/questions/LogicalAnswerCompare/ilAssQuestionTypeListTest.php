<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionTypeListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionTypeListTest extends assBaseTestCase
{
    private ilAssQuestionTypeList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilDB();

        $this->testObj = new ilAssQuestionTypeList();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionTypeList::class, $this->testObj);
    }
}