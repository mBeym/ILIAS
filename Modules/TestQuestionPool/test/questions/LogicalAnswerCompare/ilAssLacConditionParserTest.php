<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacConditionParserTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacConditionParserTest extends assBaseTestCase
{
    private ilAssLacConditionParser $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacConditionParser();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacConditionParser::class, $this->testObj);
    }
}