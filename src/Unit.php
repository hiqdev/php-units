<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units;

use hiqdev\php\units\tree\TreeConverter;

/**
 * Unit of measure based on TreeConverter implementation.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
final class Unit extends AbstractUnit
{
    private static $defaultConverter;

    protected static function findConverter()
    {
        if (empty(static::$defaultConverter)) {
            static::$defaultConverter = static::findDefaultConverter();
        }

        return static::$defaultConverter;
    }

    protected static function findDefaultConverter()
    {
        return new TreeConverter();
    }
}
