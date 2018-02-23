<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */
error_reporting(E_ALL & ~E_NOTICE);

$bootstrap = __DIR__ . '/../src/_bootstrap.php';

require_once file_exists($bootstrap) ? $bootstrap : __DIR__ . '/../vendor/autoload.php';

/*
 * Ensures compatibility with PHPUnit 5.x
 */
if (!class_exists(\PHPUnit\Framework\TestCase::class) && class_exists(\PHPUnit_Framework_TestCase::class)) {
    namespace \PHPUnit\Framework;
    abstract class TestCase extends \PHPUnit_Framework_TestCase
    {
    }
}
