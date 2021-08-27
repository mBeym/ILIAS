<?php
/* Copyright (c) 1998-2013 ILIAS open source, Extended GPL, see docs/LICENSE */

use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/assBaseTestCase.php";

class ilModulesTestQuestionPoolSuite extends TestSuite
{
    public static function suite()
    {
        if(!defined("DEBUG")) {
            define("DEBUG", false);
        }

        $_SERVER["PATH_INFO"] = "/some/stuff";

        if(!defined("ROOT_FOLDER_ID")) {
            define("ROOT_FOLDER_ID", 1);
        }

        if(!defined("ILIAS_LOG_ENABLED")) {
            define("ILIAS_LOG_ENABLED", false);
        }

        if (!defined("CLIENT_DATA_DIR")) {
            define("CLIENT_DATA_DIR", "/tmp");
        }

        if (!defined("IL_INST_ID")) {
            define("IL_INST_ID", 0);
        }

        if (defined('ILIAS_PHPUNIT_CONTEXT')) {
            include_once("./Services/PHPUnit/classes/class.ilUnitUtil.php");
            ilUnitUtil::performInitialisation();
        } else {
            chdir(dirname(__FILE__));
            chdir('../../../');
        }

        $suite = new ilModulesTestQuestionPoolSuite();

        foreach (new RegExIterator(
                     new RecursiveIteratorIterator(
                         new RecursiveDirectoryIterator(__DIR__, FilesystemIterator::SKIP_DOTS),
                         RecursiveIteratorIterator::LEAVES_ONLY
                     ),
                     '/BaseTest\.php$/'
                 ) as $file) {
            /** @var SplFileInfo $file */
            require_once $file->getPathname();
        }

        foreach (new RegExIterator(
                     new RecursiveIteratorIterator(
                         new RecursiveDirectoryIterator(__DIR__, FilesystemIterator::SKIP_DOTS),
                         RecursiveIteratorIterator::LEAVES_ONLY
                     ),
                     '/(?<!Base)Test\.php$/'
                 ) as $file) {
            /** @var SplFileInfo $file */
            require_once $file->getPathname();

            $className = preg_replace('/(.*?)(\.php)/', '$1', $file->getBasename());
            if (class_exists($className)) {
                $reflection = new ReflectionClass($className);
                if (
                    !$reflection->isAbstract() &&
                    !$reflection->isInterface() &&
                    $reflection->isSubclassOf(TestCase::class)) {
                    $suite->addTestSuite($className);
                }
            }
        }
        return $suite;
    }
}
