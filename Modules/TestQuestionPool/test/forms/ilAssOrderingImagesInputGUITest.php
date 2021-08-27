<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingImagesInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingImagesInputGUITest extends assBaseTestCase
{
    private ilAssOrderingImagesInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingImagesInputGUI(
            $this->createMock(ilAssOrderingFormValuesObjectsConverter::class),
            "test"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingImagesInputGUI::class, $this->testObj);
    }
}