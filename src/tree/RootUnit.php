<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tree;

use hiqdev\php\units\CalculatorInterface;
use hiqdev\php\units\calculators\PhpCalculator;
use hiqdev\php\units\exceptions\InvalidArgumentException;
use hiqdev\php\units\exceptions\NotConvertibleException;
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
    protected $tree;

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

    /** @return UnitInterface */
    public function getParent()
    {
        return $this;
    }

    /** @return UnitInterface */
    public function getRoot()
    {
        return $this;
    }

    public function getFactor()
    {
        return null;
    }

    public function getMeasure()
    {
        return $this->name;
    }

    /**
     * @param TreeConverter $tree
     * @param string $name
     */
    public function __construct(TreeConverter $tree, $name)
    {
        $this->tree = $tree;
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
        return $this->getName() === $other->getName() || $this->isAlias($other);
    }

    public function isAlias(UnitInterface $other)
    {
        $node = $this->getNode($other);

        return $this === $node->getCanon()
            || $node === $this->getCanon()
            || (
                $this->getRoot() === $this->getNode($other)->getRoot()
                && $this->getFactor() === $this->getNode($other)->getFactor()
            );
    }

    public function getCanon()
    {
        return $this;
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
        $this->assertConvertible($other);

        $other = $this->getNode($other);

        if ($this->equals($other)) {
            return $quantity;
        }

        if ($other->equals($this->getParent())) {
            return $this->multiplyByFactor($quantity);
        }

        if ($this->equals($other->getParent())) {
            return $other->divideByFactor($quantity);
        }

        return $this->getRoot()->convert($other, $this->convert($this->getRoot(), $quantity));
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

    public function getNode(UnitInterface $unit)
    {
        return $this->tree->getNode($unit);
    }
}
