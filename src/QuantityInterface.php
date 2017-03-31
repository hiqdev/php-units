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
 * Quantity with Unit.
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
     * Compare this quantity to other.
     * @param QuantityInterface
     * @return int
     */
    public function compare(QuantityInterface $other);

    /**
     * Compare this quantity equals to other
     * @param QuantityInterface
     * @return bool
     */
    public function equals(QuantityInterface $other);

    /**
     * Checks if this quantity is convertible to other unit.
     * @param UnitInterface $unit
     * @return QuantityInterface
     */
    public function isConvertible(UnitInterface $unit);

    /**
     * Converts to other unit.
     * @param UnitInterface
     * @return QuantityInterface
     */
    public function convert(UnitInterface $unit);

    /**
     * Add addend to this quantity.
     * @param QuantityInterface $addend
     * @return QuantityInterface
     */
    public function add(QuantityInterface $addend);

    /**
     * Subtract subtrahend from this quantity.
     * @param QuantityInterface $subtrahend
     * @return QuantityInterface
     */
    public function subtract(QuantityInterface $subtrahend);

    /**
     * Multiply this quantity with multiplier.
     * @param int|float|string $multiplier
     * @return QuantityInterface
     */
    public function multiply($multiplier);

    /**
     * Divide amount with divisor.
     * @param int|float|string $divisor
     * @return QuantityInterface
     */
    public function divide($divisor);

    /**
     * Round this quantity to following integer.
     * @return QuantityInterface
     */
    public function ceil();

    /**
     * Round this quantity to preceding integer.
     * @return QuantityInterface
     */
    public function floor();

    /**
     * Round this quantity use rounding mode.
     * @param int $roundingMode
     * @return QuantityInterface
     */
    public function round($roundingMode);

    /**
     * Returns the absolute value of this quantity.
     * @return QuantityInterface
     */
    public function absolute();
}
