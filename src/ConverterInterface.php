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
 * Unit Converter Interface.
 *
 * Provides conversion interface.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface ConverterInterface
{
    /**
     * Returns calculator to be used for given unit.
     * @param UnitInterface $unit
     */
    public function getCalculator(UnitInterface $unit);

    /**
     * Checks whether the given unit is convertible to other unit.
     * Note conversions may be non reversible.
     * @param UnitInterface $unit
     * @param UnitInterface $other
     */
    public function isConvertible(UnitInterface $unit, UnitInterface $other);

    /**
     * Converts given quantity to other unit.
     * @param UnitInterface $unit
     * @param UnitInterface $other
     * @param int|float|string $quantity in original units
     * @return int|float|string $quantity in other units
     */
    public function convert(UnitInterface $unit, UnitInterface $other, $quantity);

    /**
     * Returns measure name for $unit
     *
     * @param UnitInterface $unit
     * @return string
     */
    public function getMeasure(UnitInterface $unit);
}
