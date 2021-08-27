<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacExclusiveResultExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacExclusiveResultExpressionTest extends assBaseTestCase
{
    private ilAssLacExclusiveResultExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacExclusiveResultExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacExclusiveResultExpression::class, $this->testObj);
    }
}