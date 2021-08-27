<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionPoolExportGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionPoolExportGUITest extends assBaseTestCase
{
    private ilQuestionPoolExportGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilQuestionPoolExportGUI(
            $this->createMock(ilObjQuestionPoolGUI::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionPoolExportGUI::class, $this->testObj);
    }
}