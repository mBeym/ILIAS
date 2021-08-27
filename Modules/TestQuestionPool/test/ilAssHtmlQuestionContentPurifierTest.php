<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssHtmlQuestionContentPurifierTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssHtmlQuestionContentPurifierTest extends assBaseTestCase
{
    private ilAssHtmlQuestionContentPurifier $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilDB();
        $this->testObj = new ilAssHtmlQuestionContentPurifier();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssHtmlQuestionContentPurifier::class, $this->testObj);
    }
}