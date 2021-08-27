<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacLesserOrEqualsOperationTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacLesserOrEqualsOperationTest extends assBaseTestCase
{
    private ilAssLacLesserOrEqualsOperation $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacLesserOrEqualsOperation();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacLesserOrEqualsOperation::class, $this->testObj);
    }
}