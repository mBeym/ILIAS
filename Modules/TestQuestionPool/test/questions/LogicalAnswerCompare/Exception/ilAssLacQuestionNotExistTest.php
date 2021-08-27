<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacQuestionNotExistTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacQuestionNotExistTest extends assBaseTestCase
{
    private ilAssLacQuestionNotExist $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacQuestionNotExist(0);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacQuestionNotExist::class, $this->testObj);
    }
}