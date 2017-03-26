<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tree;

use hiqdev\php\units\calculators\PhpCalculator;
use hiqdev\php\units\UnitInterface;

/**
 * Root unit in tree.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class RootUnit implements UnitInterface
{
    /**
     * @var TreeConverter
     */
    protected $converter;

    /**
     * @var string
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    public function getRoot()
    {
        return $this;
    }

    public function getMeasure()
    {
        return $this->name;
    }

    /**
     * @param TreeConverter $converter
     * @param string $name
     */
    public function __construct(TreeConverter $converter, $name)
    {
        $this->converter = $converter;
        $this->name = $name;
    }

    protected $calculator;

    /**
     * Returns calculator for this unit.
     * Units can have different calculators.
     * @return CalculatorInterface
     */
    public function getCalculator()
    {
        if ($this->calculator === null) {
            $this->calculator = new PhpCalculator();
        }

        return $this->calculator;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(UnitInterface $other)
    {
        return $this->getName() === $other->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function assertConvertible(UnitInterface $other)
    {
        if (!$this->isConvertible($other)) {
            throw new InvalidArgumentException('not convertible unit: ' . $other->getName());
        }
    }

    /**
     * {@inheritdoc}
     */
    final public function isConvertible(UnitInterface $other)
    {
        return $this->getMeasure() === $other->getMeasure();
    }

    /**
     * {@inheritdoc}
     */
    public function convert(UnitInterface $other, $quantity)
    {
        $other = $this->converter->getNode($other);
        if ($other->equals($this->getParent())) {
            return $this->mutliplyByFactor($quantity);
        }

        if ($this->equals($other->getParent())) {
            return $other->divideByFactor($quantity);
        }

        return NotConvertibleException('not yet implemented: ' . $this->getName() . ' -> ' . $other->getName());
    }

    public function multiplyByFactor($quantity)
    {
        if (empty($this->factor)) {
            throw new NotConvertibleException('method not yet implement: ' . $this->getName());
        }

        return $this->getCalculator()->multiply($quantity, $this->factor);
    }

    public function divideByFactor($quantity)
    {
        if (empty($this->factor)) {
            throw new NotConvertibleException('method not yet implement: ' . $this->getName());
        }

        return $this->getCalculator()->divide($quantity, $this->factor);
    }
}
