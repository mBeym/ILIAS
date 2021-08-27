<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilGlobalUnitConfigurationGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilGlobalUnitConfigurationGUITest extends assBaseTestCase
{
    private ilGlobalUnitConfigurationGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilGlobalUnitConfigurationGUI(
            $this->createMock(ilUnitConfigurationRepository::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilGlobalUnitConfigurationGUI::class, $this->testObj);
    }
}