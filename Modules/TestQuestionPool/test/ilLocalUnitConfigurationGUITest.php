<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilLocalUnitConfigurationGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilLocalUnitConfigurationGUITest extends assBaseTestCase
{
    private ilLocalUnitConfigurationGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilLocalUnitConfigurationGUI(
            $this->createMock(ilUnitConfigurationRepository::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilLocalUnitConfigurationGUI::class, $this->testObj);
    }
}