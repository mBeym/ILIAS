<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssSpecificFeedbackIdentifierListTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssSpecificFeedbackIdentifierListTest extends assBaseTestCase
{
    private ilAssSpecificFeedbackIdentifierList $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssSpecificFeedbackIdentifierList();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssSpecificFeedbackIdentifierList::class, $this->testObj);
    }
}