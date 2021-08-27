<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionPreviewToolbarGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionPreviewToolbarGUITest extends assBaseTestCase
{
    private ilAssQuestionPreviewToolbarGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionPreviewToolbarGUI(
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionPreviewToolbarGUI::class, $this->testObj);
    }
}