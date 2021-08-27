<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssSelfAssessmentQuestionFormatterTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssSelfAssessmentQuestionFormatterTest extends assBaseTestCase
{
    private ilAssSelfAssessmentQuestionFormatter $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssSelfAssessmentQuestionFormatter();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssSelfAssessmentQuestionFormatter::class, $this->testObj);
    }
}