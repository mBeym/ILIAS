<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssNestedOrderingElementsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssNestedOrderingElementsInputGUITest extends assBaseTestCase
{
    private ilAssNestedOrderingElementsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssNestedOrderingElementsInputGUI(
            $this->createMock(ilAssOrderingFormValuesObjectsConverter::class),
            "test"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssNestedOrderingElementsInputGUI::class, $this->testObj);
    }
}