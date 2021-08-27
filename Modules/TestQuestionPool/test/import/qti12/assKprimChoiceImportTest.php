<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assKprimChoiceImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assKprimChoiceImportTest extends assBaseTestCase
{
    private assKprimChoiceImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assKprimChoiceImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assKprimChoiceImport::class, $this->testObj);
    }
}