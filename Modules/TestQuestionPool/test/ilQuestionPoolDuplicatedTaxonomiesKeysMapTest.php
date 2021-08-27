<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionPoolDuplicatedTaxonomiesKeysMapTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionPoolDuplicatedTaxonomiesKeysMapTest extends assBaseTestCase
{
    private ilQuestionPoolDuplicatedTaxonomiesKeysMap $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilQuestionPoolDuplicatedTaxonomiesKeysMap();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionPoolDuplicatedTaxonomiesKeysMap::class, $this->testObj);
    }
}