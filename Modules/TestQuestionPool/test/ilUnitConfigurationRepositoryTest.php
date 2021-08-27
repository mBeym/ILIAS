<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilUnitConfigurationRepositoryTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilUnitConfigurationRepositoryTest extends assBaseTestCase
{
    private ilUnitConfigurationRepository $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilUnitConfigurationRepository(
            0
        );
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilUnitConfigurationRepository::class, $this->testObj);
    }
}