<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssKprimChoiceAnswerTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssKprimChoiceAnswerTest extends assBaseTestCase
{
    private ilAssKprimChoiceAnswer $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssKprimChoiceAnswer();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssKprimChoiceAnswer::class, $this->testObj);
    }
}