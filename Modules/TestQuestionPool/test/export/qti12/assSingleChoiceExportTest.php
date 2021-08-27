<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assSingleChoiceExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assSingleChoiceExportTest extends assBaseTestCase
{
    private assSingleChoiceExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assSingleChoiceExport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assSingleChoiceExport::class, $this->testObj);
    }
}