<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacPercentageResultExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacPercentageResultExpressionTest extends assBaseTestCase
{
    private ilAssLacPercentageResultExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacPercentageResultExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacPercentageResultExpression::class, $this->testObj);
    }
}