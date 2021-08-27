<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssLacCompositeValidatorTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssLacCompositeValidatorTest extends assBaseTestCase
{
    private ilAssLacCompositeValidator $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssLacCompositeValidator(
            $this->createMock(ilAssLacQuestionProvider::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssLacCompositeValidator::class, $this->testObj);
    }
}