<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacMissingBracketTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacMissingBracketTest extends assBaseTestCase
{
    private ilAssLacMissingBracket $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacMissingBracket("bracket");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacMissingBracket::class, $this->testObj);
    }
}