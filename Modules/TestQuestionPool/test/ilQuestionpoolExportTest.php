<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilQuestionpoolExportTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilQuestionpoolExportTest extends assBaseTestCase
{
    private ilQuestionpoolExport $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_ilErr();
        $this->addGlobal_ilDB();
        $this->addGlobal_ilias();


        $this->testObj = new ilQuestionpoolExport(
            $this->createMock(ilObjQuestionPool::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilQuestionpoolExport::class, $this->testObj);
    }
}