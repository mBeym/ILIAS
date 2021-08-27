<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionTypeTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionTypeTest extends assBaseTestCase
{
    private ilAssQuestionType $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $this->testObj = new ilAssQuestionType();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionType::class, $this->testObj);
    }
}