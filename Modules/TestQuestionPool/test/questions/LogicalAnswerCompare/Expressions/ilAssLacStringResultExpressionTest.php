<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacStringResultExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacStringResultExpressionTest extends assBaseTestCase
{
    private ilAssLacStringResultExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacStringResultExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacStringResultExpression::class, $this->testObj);
    }
}