<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingElementListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingElementListTest extends assBaseTestCase
{
    private ilAssOrderingElementList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingElementList();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingElementList::class, $this->testObj);
    }
}