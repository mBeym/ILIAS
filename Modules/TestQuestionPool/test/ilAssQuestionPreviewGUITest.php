<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionPreviewGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionPreviewGUITest extends assBaseTestCase
{
    private ilAssQuestionPreviewGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionPreviewGUI(
            $this->createMock(ilCtrl::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilGlobalPageTemplate::class),
            $this->createMock(ilLanguage::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilObjUser::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionPreviewGUI::class, $this->testObj);
    }
}