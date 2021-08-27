<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssErrorTextFeedbackTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilAssErrorTextFeedbackTest extends assBaseTestCase
{
    private ilAssErrorTextFeedback $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilAssErrorTextFeedback(
            $this->createMock(assQuestion::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilAssErrorTextFeedback::class, $this->testObj);
    }
}