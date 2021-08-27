<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingDefaultElementFallbackTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingDefaultElementFallbackTest extends assBaseTestCase
{
    private ilAssOrderingDefaultElementFallback $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingDefaultElementFallback();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingDefaultElementFallback::class, $this->testObj);
    }
}