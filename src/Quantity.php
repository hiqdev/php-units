<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units;

/**
 * Quantity with Unit.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
final class Quantity extends AbstractQuantity
{
    protected static function findUnit($unit)
    {
        return $unit instanceof UnitInterface ? $unit : Unit::$unit();
    }
}
