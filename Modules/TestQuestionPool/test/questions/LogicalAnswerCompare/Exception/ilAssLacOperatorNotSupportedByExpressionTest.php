<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacOperatorNotSupportedByExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacOperatorNotSupportedByExpressionTest extends assBaseTestCase
{
    private ilAssLacOperatorNotSupportedByExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacOperatorNotSupportedByExpression("expression", "operator");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacOperatorNotSupportedByExpression::class, $this->testObj);
    }
}