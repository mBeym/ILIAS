<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacDuplicateElementTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacDuplicateElementTest extends assBaseTestCase
{
    private ilAssLacDuplicateElement $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacDuplicateElement("test");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacDuplicateElement::class, $this->testObj);
    }
}