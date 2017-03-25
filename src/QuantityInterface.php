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

/**
 * Float Quantity with Unit.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface QuantityInterface
{
    /**
     * Returns quantity represented by this object.
     * @return int|float|string
     */
    public function getQuantity();

    /**
     * Returns the unit of this object.
     * @return UnitInterface
     */
    public function getUnit();

    /**
     * Converts to other unit.
     * @return QuantityInterface
     */
    public function convert(UnitInterface $unit);
}
