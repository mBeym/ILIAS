<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilObjQuestionPoolXMLParserTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilObjQuestionPoolXMLParserTest extends assBaseTestCase
{
    private ilObjQuestionPoolXMLParser $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilObjQuestionPoolXMLParser(
            $this->createMock(ilObjQuestionPool::class),
            ""
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilObjQuestionPoolXMLParser::class, $this->testObj);
    }
}