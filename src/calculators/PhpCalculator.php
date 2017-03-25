<?php

namespace hiqdev\php\units\calculators;

use hiqdev\php\units\CalculatorInterface;

/**
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class PhpCalculator implements CalculatorInterface
{
    /**
     * {@inheritdoc}
     */
    public static function isSupported()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function compare($a, $b)
    {
        return ($a < $b) ? -1 : (($a > $b) ? 1 : 0);
    }

    /**
     * {@inheritdoc}
     */
    public function add($amount, $addend)
    {
        $result = $amount + $addend;

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function subtract($amount, $subtrahend)
    {
        $result = $amount - $subtrahend;

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function multiply($amount, $multiplier)
    {
        $result = $amount * $multiplier;

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function divide($amount, $divisor)
    {
        $result = $amount / $divisor;

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function ceil($number)
    {
        return ceil($number);
    }

    /**
     * {@inheritdoc}
     */
    public function floor($number)
    {
        return floor($number);
    }

    /**
     * {@inheritdoc}
     */
    public function absolute($number)
    {
        throw new \Exception();
    }

    /**
     * {@inheritdoc}
     */
    public function round($number, $roundingMode)
    {
        throw new \Exception();
    }
}
