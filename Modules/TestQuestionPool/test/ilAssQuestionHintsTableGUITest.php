<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintsTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintsTableGUITest extends assBaseTestCase
{
    private ilAssQuestionHintsTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $assQuestionHintList = new ilAssQuestionHintList();
        $assQuestionHintList->addHint(new ilAssQuestionHint());

        $this->testObj = new ilAssQuestionHintsTableGUI(
            $this->createMock(assQuestion::class),
            $assQuestionHintList,
            $this->createMock(ilAssQuestionHintsGUI::class),
            "show"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintsTableGUI::class, $this->testObj);
    }
}