<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assSingleChoiceImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assSingleChoiceImportTest extends assBaseTestCase
{
    private assSingleChoiceImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assSingleChoiceImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assSingleChoiceImport::class, $this->testObj);
    }
}