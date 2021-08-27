<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacNumericResultExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacNumericResultExpressionTest extends assBaseTestCase
{
    private ilAssLacNumericResultExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacNumericResultExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacNumericResultExpression::class, $this->testObj);
    }
}