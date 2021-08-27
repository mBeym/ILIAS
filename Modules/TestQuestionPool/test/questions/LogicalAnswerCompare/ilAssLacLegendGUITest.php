<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

use ILIAS\UI\Factory;

/**
 * Class ilAssLacLegendGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacLegendGUITest extends assBaseTestCase
{
    private ilAssLacLegendGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacLegendGUI(
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(Factory::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacLegendGUI::class, $this->testObj);
    }
}