<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacUnableToParseConditionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacUnableToParseConditionTest extends assBaseTestCase
{
    private ilAssLacUnableToParseCondition $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacUnableToParseCondition("false");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacUnableToParseCondition::class, $this->testObj);
    }
}