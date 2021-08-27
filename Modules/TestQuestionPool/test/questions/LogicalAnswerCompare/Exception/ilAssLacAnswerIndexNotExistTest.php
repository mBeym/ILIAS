<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacAnswerIndexNotExistTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacAnswerIndexNotExistTest extends assBaseTestCase
{
    private ilAssLacAnswerIndexNotExist $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacAnswerIndexNotExist(0, 0);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacAnswerIndexNotExist::class, $this->testObj);
    }
}