<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionPoolImportVerificationTableGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionPoolImportVerificationTableGUITest extends assBaseTestCase
{
    private ilQuestionPoolImportVerificationTableGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilPluginAdmin();

        $this->testObj = new ilQuestionPoolImportVerificationTableGUI(
            $this->createMock(ilObjQuestionPool::class),
            "uploadQplObject"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionPoolImportVerificationTableGUI::class, $this->testObj);
    }
}