<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssQuestionSkillAssignmentXmlParserTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssQuestionSkillAssignmentXmlParserTest extends assBaseTestCase
{
    private ilAssQuestionSkillAssignmentXmlParser $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssQuestionSkillAssignmentXmlParser(
            "test"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssQuestionSkillAssignmentXmlParser::class, $this->testObj);
    }
}