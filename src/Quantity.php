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

use hiqdev\php\units\exceptions\InvalidArgumentException;

/**
 * Quantity with Unit.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
final class Quantity extends AbstractQuantity
{
    protected static function findUnit($unit)
    {
        if ($unit instanceof UnitInterface) {
            return $unit;
        }
        if (!is_string($unit)) {
            throw new InvalidArgumentException('uncompatible unit name: ' . var_export($unit, true));
        }

        return Unit::$unit();
    }
}
