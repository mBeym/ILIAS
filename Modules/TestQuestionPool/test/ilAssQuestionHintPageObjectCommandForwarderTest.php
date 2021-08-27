<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionHintPageObjectCommandForwarderTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionHintPageObjectCommandForwarderTest extends assBaseTestCase
{
    private ilAssQuestionHintPageObjectCommandForwarder $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $_GET['hint_id'] = 0;
        $this->testObj = new ilAssQuestionHintPageObjectCommandForwarder(
            $this->createMock(assQuestion::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionHintPageObjectCommandForwarder::class, $this->testObj);
    }
}