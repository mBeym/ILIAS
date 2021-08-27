<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilLogicalAnswerComparisonExpressionInputGUITest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilLogicalAnswerComparisonExpressionInputGUITest extends assBaseTestCase
{
    private ilLogicalAnswerComparisonExpressionInputGUI $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilLogicalAnswerComparisonExpressionInputGUI();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilLogicalAnswerComparisonExpressionInputGUI::class, $this->testObj);
    }
}