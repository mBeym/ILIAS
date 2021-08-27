<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssSpecificFeedbackIdentifierTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssSpecificFeedbackIdentifierTest extends assBaseTestCase
{
    private ilAssSpecificFeedbackIdentifier $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssSpecificFeedbackIdentifier();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssSpecificFeedbackIdentifier::class, $this->testObj);
    }
}