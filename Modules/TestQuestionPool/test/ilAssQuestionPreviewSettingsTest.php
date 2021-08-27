<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionPreviewSettingsTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionPreviewSettingsTest extends assBaseTestCase
{
    private ilAssQuestionPreviewSettings $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionPreviewSettings(0);
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionPreviewSettings::class, $this->testObj);
    }
}