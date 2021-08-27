<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssOrderingTextsInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssOrderingTextsInputGUITest extends assBaseTestCase
{
    private ilAssOrderingTextsInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssOrderingTextsInputGUI(
            $this->createMock(ilAssOrderingFormValuesObjectsConverter::class),
            "test"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssOrderingTextsInputGUI::class, $this->testObj);
    }
}