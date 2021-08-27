<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilSolutionExplorerTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilSolutionExplorerTest extends assBaseTestCase
{
    private ilSolutionExplorer $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();
        $this->addGlobal_tree();
        $this->addGlobal_objDefinition();
        $this->addGlobal_ilErr();
        $this->addGlobal_rbacsystem();
        $this->addGlobal_ilias();
        $this->addGlobal_ilDB();

        $this->markTestSkipped("Using undefined property");
        $this->testObj = new ilSolutionExplorer(
            "test",
            "test"
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilSolutionExplorer::class, $this->testObj);
    }
}