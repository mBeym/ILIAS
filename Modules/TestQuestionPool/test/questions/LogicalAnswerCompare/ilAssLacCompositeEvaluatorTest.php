<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacCompositeEvaluatorTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacCompositeEvaluatorTest extends assBaseTestCase
{
    private ilAssLacCompositeEvaluator $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacCompositeEvaluator(
            $this->createMock(ilAssLacQuestionProvider::class),
            0,
            0
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacCompositeEvaluator::class, $this->testObj);
    }
}