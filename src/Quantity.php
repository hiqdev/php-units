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
class Quantity implements QuantityInterface
{
    /**
     * @var UnitInterface
     */
    protected $unit;

    /**
     * @var float|int|string
     */
    protected $quantity;

    /**
     * @var UnitInterface
     * @var float|int|string
     */
    public function __construct(UnitInterface $unit, $quantity)
    {
        $this->unit = $unit;
        $this->quantity = $quantity;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * {@inheritdoc}
     */
    public function convert(UnitInterface $unit)
    {
        return new static($this->unit, $this->unit->convertTo($unit, $this->quantity));
    }

    /**
     * {@inheritdoc}
     */
    public function add(QuantityInterface $rhs)
    {
        $arg = $rhs->getUnit()->convertTo($this->unit, $rhs->getQuantity());
        $res = $this->getCalculator()->add($this->quantity, $arg);

        return new static($this->unit, $res);
    }

    /**
     * {@inheritdoc}
     */
    public function subtract(QuantityInterface $rhs)
    {
        $arg = $rhs->getUnit()->convertTo($this->unit, $rhs->getQuantity());
        $res = $this->getCalculator()->subtract($this->quantity, $arg);

        return new static($this->unit, $res);
    }

    /**
     * {@inheritdoc}
     */
    public function multiply($rhs)
    {
        $res = $this->getCalculator()->multiply($this->quantity, $rhs);

        return new static($this->unit, $res);
    }

    /**
     * {@inheritdoc}
     */
    public function divide($rhs)
    {
        $res = $this->getCalculator()->divide($this->quantity, $rhs);

        return new static($this->unit, $res);
    }

    public function __callStatic($unit, $quantity)
    {
        return new Quantity(Unit::$unit(), (float) $quantity);
    }
}
