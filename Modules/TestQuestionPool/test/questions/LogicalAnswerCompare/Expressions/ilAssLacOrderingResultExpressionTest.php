<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacOrderingResultExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacOrderingResultExpressionTest extends assBaseTestCase
{
    private ilAssLacOrderingResultExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacOrderingResultExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacOrderingResultExpression::class, $this->testObj);
    }
}