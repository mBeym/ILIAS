<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilObjQuestionPoolTaxonomyEditingCommandForwarderTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilObjQuestionPoolTaxonomyEditingCommandForwarderTest extends assBaseTestCase
{
    private ilObjQuestionPoolTaxonomyEditingCommandForwarder $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilObjQuestionPoolTaxonomyEditingCommandForwarder(
            $this->createMock(ilObjQuestionPool::class),
            $this->createMock(ilDBInterface::class),
            $this->createMock(ilPluginAdmin::class),
            $this->createMock(ilCtrl::class),
            $this->createMock(ilTabsGUI::class),
            $this->createMock(ilLanguage::class)
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilObjQuestionPoolTaxonomyEditingCommandForwarder::class, $this->testObj);
    }
}