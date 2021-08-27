<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacQuestionProviderTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacQuestionProviderTest extends assBaseTestCase
{
    private ilAssLacQuestionProvider $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacQuestionProvider();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacQuestionProvider::class, $this->testObj);
    }
}