<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class assClozeTestImportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class assClozeTestImportTest extends assBaseTestCase
{
    private assClozeTestImport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new assClozeTestImport(
            $this->createMock(assQuestion::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(assClozeTestImport::class, $this->testObj);
    }
}