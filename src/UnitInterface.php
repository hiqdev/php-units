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
 * Unit of measurement.
 *
 * Provides:
 *
 * - name, eg: bit, byte, kilobyte, ... mm, cm, m, km, ...
 * - measure: bit, length, temperature
 * - equals: kilobyte = KB
 * - isConvertible: bit <-> byte, m <-> km
 * - convert: 1 byte = 8 bit
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface UnitInterface
{
    /**
     * Returns name of the unit.
     * @return string
     */
    public function getName();

    /**
     * Returns the measure this unit measures.
     * @return string
     */
    public function getMeasure();

    /**
     * Checks whether this unit equals to other.
     * Note aliases are equal, eg: kilobyte = KB.
     * @param UnitInterface $other
     * @return bool
     */
    public function equals(UnitInterface $other);

    /**
     * Checks whether this unit is convertible to other.
     * @param UnitInterface $other
     * @return bool
     */
    public function isConvertible(UnitInterface $other);

    /**
     * Converts to other unit quantity.
     * @param UnitInterface $other
     * @param int|float|string $amount raw amount
     * @return int|float|string quantity
     */
    public function convert(UnitInterface $other, $quantity);
}
