<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingElementTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingElementTest extends assBaseTestCase
{
    private ilAssOrderingElement $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingElement();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingElement::class, $this->testObj);
    }
}