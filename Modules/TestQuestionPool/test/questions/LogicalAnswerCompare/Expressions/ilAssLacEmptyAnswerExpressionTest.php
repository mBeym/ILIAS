<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacEmptyAnswerExpressionTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacEmptyAnswerExpressionTest extends assBaseTestCase
{
    private ilAssLacEmptyAnswerExpression $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacEmptyAnswerExpression();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacEmptyAnswerExpression::class, $this->testObj);
    }
}