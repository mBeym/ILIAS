<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacAnswerValueNotExistTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacAnswerValueNotExistTest extends assBaseTestCase
{
    private ilAssLacAnswerValueNotExist $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacAnswerValueNotExist(0, "value");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacAnswerValueNotExist::class, $this->testObj);
    }
}