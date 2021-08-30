<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilImagemapPreviewTest
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilImagemapPreviewTest extends assBaseTestCase
{
    private ilImagemapPreview $testObj;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->testObj = new ilImagemapPreview();
    }

	public function test_instantiateObject_shouldReturnInstance() : void
    {
        $this->assertInstanceOf(ilImagemapPreview::class, $this->testObj);
    }
}