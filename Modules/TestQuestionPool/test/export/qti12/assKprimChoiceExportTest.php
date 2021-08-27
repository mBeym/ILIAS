<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assKprimChoiceExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assKprimChoiceExportTest extends assBaseTestCase
{
    private assKprimChoiceExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assKprimChoiceExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assKprimChoiceExport::class, $this->testObj);
    }
}