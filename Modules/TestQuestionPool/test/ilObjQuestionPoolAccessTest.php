<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilObjQuestionPoolAccessTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilObjQuestionPoolAccessTest extends assBaseTestCase
{
    private ilObjQuestionPoolAccess $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilObjQuestionPoolAccess();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilObjQuestionPoolAccess::class, $this->testObj);
    }
}