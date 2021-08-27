<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionListTest extends assBaseTestCase
{
    private ilAssQuestionList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionList(
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilPluginAdmin::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionList::class, $this->testObj);
    }
}