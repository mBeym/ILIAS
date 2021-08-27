<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assFileUploadFileTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assFileUploadFileTableGUITest extends assBaseTestCase
{
    private assFileUploadFileTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->addGlobal_ilPluginAdmin();

        $this->testObj = new assFileUploadFileTableGUI(
            null,
            "handleQuestionAction",
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assFileUploadFileTableGUI::class, $this->testObj);
    }
}