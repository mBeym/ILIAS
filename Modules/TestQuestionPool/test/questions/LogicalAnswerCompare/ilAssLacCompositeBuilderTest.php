<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacCompositeBuilderTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacCompositeBuilderTest extends assBaseTestCase
{
    private ilAssLacCompositeBuilder $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacCompositeBuilder();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacCompositeBuilder::class, $this->testObj);
    }
}