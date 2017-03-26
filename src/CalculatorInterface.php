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
 * Calculator Interface.
 *
 * - isSupported
 * - compare
 * - add, subtract, multiply, divide
 * - round, ceil, floor, absolute
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
interface CalculatorInterface
{
    /**
     * Returns whether the calculator is supported in
     * the current server environment.
     * @return bool
     */
    public static function isSupported();

    /**
     * Compare a to b.
     * @param int|float|string $a
     * @param int|float|string $b
     * @return int
     */
    public function compare($a, $b);

    /**
     * Add added to amount.
     * @param int|float|string $amount
     * @param int|float|string $addend
     * @return int|float|string
     */
    public function add($amount, $addend);

    /**
     * Subtract subtrahend from amount.
     * @param int|float|string $amount
     * @param int|float|string $subtrahend
     * @return int|float|string
     */
    public function subtract($amount, $subtrahend);

    /**
     * Multiply amount with multiplier.
     * @param int|float|string $amount
     * @param int|float|string $multiplier
     * @return int|float|string
     */
    public function multiply($amount, $multiplier);

    /**
     * Divide amount with divisor.
     *
     * @param int|float|string           $amount
     * @param int|float|string $divisor
     *
     * @return int|float|string
     */
    public function divide($amount, $divisor);

    /**
     * Round number to following integer.
     * @param int|float|string $number
     * @return int|float|string
     */
    public function ceil($number);

    /**
     * Round number to preceding integer.
     * @param int|float|string $number
     * @return int|float|string
     */
    public function floor($number);

    /**
     * Returns the absolute value of the number.
     * @param int|float|string $number
     * @return int|float|string
     */
    public function absolute($number);

    /**
     * Round number, use rounding mode for tie-breaker.
     * @param string $number
     * @param int    $roundingMode
     * @return string
     */
    public function round($number, $roundingMode);
}
