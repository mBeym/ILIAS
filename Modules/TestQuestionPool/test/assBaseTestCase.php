<?php
/* Copyright (c) 1998-2018 ILIAS open source, Extended GPL, see docs/LICENSE */

use PHPUnit\Framework\TestCase;
use ILIAS\Filesystem\Filesystems;
use ILIAS\FileUpload\FileUpload;
use ILIAS\HTTP\Services;
use ILIAS\UI\Implementation\Factory;

/**
 * Class assBaseTestCase
 */
abstract class assBaseTestCase extends TestCase
{
    /**
     * @inheritdoc
     */
    protected function setUp() : void
    {
        $GLOBALS['DIC'] = new \ILIAS\DI\Container();

        parent::setUp();
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    protected function setGlobalVariable($name, $value)
    {
        global $DIC;

        $GLOBALS[$name] = $value;

        unset($DIC[$name]);
        $DIC[$name] = $GLOBALS[$name];
    }

    /**
     * @return \ilTemplate|PHPUnit_Framework_MockObject_MockObject
     */
    protected function getGlobalTemplateMock()
    {
        return $this->getMockBuilder(\ilTemplate::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @return \ilDBInterface|PHPUnit_Framework_MockObject_MockObject
     */
    protected function getDatabaseMock()
    {
        return $this->getMockBuilder(\ilDBInterface::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @return \ILIAS|PHPUnit_Framework_MockObject_MockObject
     */
    protected function getIliasMock()
    {
        $mock = $this->getMockBuilder(\ILIAS::class)->disableOriginalConstructor()->getMock();

        $account = new stdClass();
        $account->id = 6;
        $account->fullname = 'Esther Tester';

        $mock->account = $account;

        return $mock;
    }

    protected function addGlobal_ilias() : void
    {
        $this->setGlobalVariable("ilias", $this->getIliasMock());
    }


    protected function addGlobal_lng() : void
    {
        $this->setGlobalVariable(
            "lng",
            $this->getMockBuilder(ilLanguage::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilAccess() : void
    {
        $this->setGlobalVariable(
            "ilAccess",
            $this->getMockBuilder(ilAccess::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilUser() : void
    {
        $this->setGlobalVariable(
            "ilUser",
            $this->getMockBuilder(ilObjUser::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_objDefinition() : void
    {
        $this->setGlobalVariable(
            "objDefinition",
            $this->getMockBuilder(ilObjectDefinition::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_tree() : void
    {
        $this->setGlobalVariable(
            "tree",
            $this->getMockBuilder(ilTree::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilSetting() : void
    {
        $this->setGlobalVariable(
            "ilSetting",
            $this->getMockBuilder(ilSetting::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_rbacsystem() : void
    {
        $this->setGlobalVariable(
            "rbacsystem",
            $this->getMockBuilder(ilRbacSystem::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilCtrl() : void
    {
        $this->setGlobalVariable(
            "ilCtrl",
            $this->getMockBuilder(ilCtrl::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_filesystem() : void
    {
        $this->setGlobalVariable(
            "filesystem",
            $this->getMockBuilder(Filesystems::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_upload() : void
    {
        $this->setGlobalVariable(
            "upload",
            $this->getMockBuilder(FileUpload::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilDB() : void
    {
        $this->setGlobalVariable(
            "ilDB",
            $this->getMockBuilder(ilDBInterface::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilLog() : void
    {
        $this->setGlobalVariable(
            "ilLog",
            $this->getMockBuilder(ilLogger::class)->disableOriginalConstructor()->getMock());
    }


    protected function addGlobal_ilErr() : void
    {
        $this->setGlobalVariable(
            "ilErr",
            $this->getMockBuilder(ilErrorHandling::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilAppEventHandler() : void
    {
        $this->setGlobalVariable(
            "ilAppEventHandler",
            $this->getMockBuilder(ilAppEventHandler::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_tpl() : void
    {
        $this->setGlobalVariable(
            "tpl",
            $this->getMockBuilder(ilGlobalPageTemplate::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilPluginAdmin() : void
    {
        $this->setGlobalVariable(
            "ilPluginAdmin",
            $this->getMockBuilder(ilPluginAdmin::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilTabs() : void
    {
        $this->setGlobalVariable(
            "ilTabs",
            $this->getMockBuilder(ilTabsGUI::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilObjDataCache() : void
    {
        $this->setGlobalVariable(
            "ilObjDataCache",
            $this->getMockBuilder(ilObjectDataCache::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilLocator() : void
    {
        $this->setGlobalVariable(
            "ilLocator",
            $this->getMockBuilder(ilLocatorGUI::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_rbacreview() : void
    {
        $this->setGlobalVariable(
            "rbacreview",
            $this->getMockBuilder(ilRbacReview::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilToolbar() : void
    {
        $this->setGlobalVariable(
            "ilToolbar",
            $this->getMockBuilder(ilToolbarGUI::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_http() : void
    {
        $this->setGlobalVariable(
            "http",
            $this->getMockBuilder(Services::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilIliasIniFile() : void
    {
        $this->setGlobalVariable(
            "ilIliasIniFile",
            $this->getMockBuilder(ilIniFile::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilLoggerFactory() : void
    {
        $this->setGlobalVariable(
            "ilLoggerFactory",
            $this->getMockBuilder(ilLoggerFactory::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_ilHelp() : void
    {
        $this->setGlobalVariable(
            "ilHelp",
            $this->getMockBuilder(ilHelp::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_uiFactory() : void
    {
        $this->setGlobalVariable(
            "ui.factory",
            $this->getMockBuilder(Factory::class)->disableOriginalConstructor()->getMock());
    }

    protected function addGlobal_uiRenderer() : void
    {
        $this->setGlobalVariable(
            "ui.renderer",
            $this->getMockBuilder(ILIAS\UI\Implementation\DefaultRenderer::class)->disableOriginalConstructor()->getMock());
    }
}
