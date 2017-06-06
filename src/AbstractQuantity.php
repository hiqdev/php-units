<?php
/**
 * PHP Units of Measure Library.
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
abstract class AbstractQuantity implements QuantityInterface, \JsonSerializable
{
    /**
     * @var UnitInterface
     */
    private $unit;

    /**
     * @var float|int|string
     */
    private $quantity;

    /**
     * @var UnitInterface
     * @var float|int|string $quantity
     */
    private function __construct(UnitInterface $unit, $quantity)
    {
        $this->unit = $unit;
        $this->quantity = $quantity;
    }

    /**
     * Creates quantity with same unit.
     * Optimized to return this if same quantity.
     * @var float|int|string
     */
    final protected function repeat($quantity)
    {
        return $this->quantity === $quantity ? $this : static::create($this->unit, $quantity);
    }

    /**
     * {@inheritdoc}
     */
    private function getCalculator()
    {
        return $this->unit->getCalculator();
    }

    /**
     * {@inheritdoc}
     */
    final public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * {@inheritdoc}
     */
    final public function getUnit()
    {
        return $this->unit;
    }

    /**
     * {@inheritdoc}
     */
    final public function compare(QuantityInterface $other)
    {
        $arg = $other->convert($this->unit)->getQuantity();

        return $this->getCalculator()->compare($this->quantity, $arg);
    }

    /**
     * {@inheritdoc}
     */
    final public function equals(QuantityInterface $other)
    {
        return $this->compare($other) === 0;
    }

    /**
     * {@inheritdoc}
     */
    final public function isPositive()
    {
        return $this->quantity > 0;
    }

    /**
     * {@inheritdoc}
     */
    final public function isNegative()
    {
        return $this->quantity < 0;
    }

    /**
     * {@inheritdoc}
     */
    final public function isConvertible(UnitInterface $unit)
    {
        return $this->unit->isConvertible($unit);
    }

    /**
     * {@inheritdoc}
     */
    final public function convert(UnitInterface $unit)
    {
        $res = $this->unit->convert($unit, $this->quantity);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function add(QuantityInterface $addend)
    {
        $arg = $addend->convert($this->unit)->getQuantity();
        $res = $this->getCalculator()->add($this->quantity, $arg);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function subtract(QuantityInterface $subtrahend)
    {
        $arg = $subtrahend->convert($this->unit)->getQuantity();
        $res = $this->getCalculator()->subtract($this->quantity, $arg);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function multiply($multiplier)
    {
        $res = $this->getCalculator()->multiply($this->quantity, $multiplier);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function divide($divisor)
    {
        $res = $this->getCalculator()->divide($this->quantity, $divisor);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function ceil()
    {
        $res = $this->getCalculator()->ceil($this->quantity);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function floor()
    {
        $res = $this->getCalculator()->floor($this->quantity);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function round($roundingMode)
    {
        $res = $this->getCalculator()->round($this->quantity, $roundingMode);

        return $this->repeat($res);
    }

    /**
     * {@inheritdoc}
     */
    final public function absolute()
    {
        $res = $this->getCalculator()->absolute($this->quantity);

        return $this->repeat($res);
    }

    final public static function __callStatic($unit, $args)
    {
        return static::create($unit, $args[0]);
    }

    public static function create($unit, $quantity)
    {
        return new static(static::findUnit($unit), $quantity);
    }

    /**
     * Returns unit for given unit name.
     * The only function to change in child classes.
     * XXX Should be defined as abstract but `abstract static` is not supported in PHP5.
     * @param string $name
     * @throws InvalidConfigException
     * @return UnitInterface
     */
    protected static function findUnit($unit)
    {
        throw new InvalidConfigException('getUnit method must be redefined');
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'unit' => $this->unit->getName(),
            'quantity' => $this->quantity,
        ];
    }

}
