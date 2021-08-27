<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionPoolFactoryTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionPoolFactoryTest extends assBaseTestCase
{
    private ilQuestionPoolFactory $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilQuestionPoolFactory();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionPoolFactory::class, $this->testObj);
    }
}