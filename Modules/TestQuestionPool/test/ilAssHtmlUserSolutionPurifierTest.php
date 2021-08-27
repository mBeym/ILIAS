<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssHtmlUserSolutionPurifierTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssHtmlUserSolutionPurifierTest extends assBaseTestCase
{
    private ilAssHtmlUserSolutionPurifier $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilDB();

        $this->testObj = new ilAssHtmlUserSolutionPurifier();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssHtmlUserSolutionPurifier::class, $this->testObj);
    }
}