<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacUnsupportedExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacUnsupportedExpressionTest extends assBaseTestCase
{
    private ilAssLacUnsupportedExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacUnsupportedExpression("test expression");
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacUnsupportedExpression::class, $this->testObj);
    }
}