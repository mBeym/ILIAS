<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacMatchingResultExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacMatchingResultExpressionTest extends assBaseTestCase
{
    private ilAssLacMatchingResultExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacMatchingResultExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacMatchingResultExpression::class, $this->testObj);
    }
}