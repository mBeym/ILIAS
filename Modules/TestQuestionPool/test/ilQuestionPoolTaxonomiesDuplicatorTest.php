<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionPoolTaxonomiesDuplicatorTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionPoolTaxonomiesDuplicatorTest extends assBaseTestCase
{
    private ilQuestionPoolTaxonomiesDuplicator $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilQuestionPoolTaxonomiesDuplicator();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionPoolTaxonomiesDuplicator::class, $this->testObj);
    }
}