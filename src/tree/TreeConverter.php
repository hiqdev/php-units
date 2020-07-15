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

use hiqdev\php\units\ConverterInterface;
use hiqdev\php\units\exceptions\NotConvertibleException;
use hiqdev\php\units\UnitInterface;

/**
 * Tree Converter.
 *
 * Uses node units to keep units info in a tree form:
 *
 * - bit:           parent=bit          factor  = 1
 * - byte:          parent=bit          factor  = 1
 * - megabyte:      parent=byte         factor  = 10^6 = 1000000
 * - mebibyte:      parent=byte         factor  = 2^20 = 1048576.
 *
 * - temperature:   parent=temperature  factor  = 1
 * - celcius:       parent=temperature  factor  = 1
 * - fahrenheit:    parent=temperature  method  = function ($x) { return ($x-32)*5/9; }
 * - kelvin:        parent=temperature  method  = function ($x) { return $x+273.16; }
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class TreeConverter implements ConverterInterface
{
    private $data;

    public function __construct($path = null)
    {
        if ($path === null) {
            $path = __DIR__ . '/../../res/units-tree.php';
        }

        $this->data = require $path;
    }

    private function findData($name)
    {
        if (!isset($this->data[$name])) {
            return [
                'parent' => '',
                'factor' => 1,
            ];
        }

        return $this->data[$name];
    }

    public function equals(UnitInterface $unit, UnitInterface $other)
    {
        return $this->getNode($unit)->equals($other);
    }

    /**
     * {@inheritdoc}
     */
    public function getCalculator(UnitInterface $unit)
    {
        return $this->getNode($unit)->getCalculator();
    }

    /**
     * {@inheritdoc}
     */
    public function isConvertible(UnitInterface $unit, UnitInterface $other)
    {
        return $this->getNode($unit)->isConvertible($other);
    }

    /**
     * {@inheritdoc}
     */
    public function getMeasure(UnitInterface $unit)
    {
        return $this->getNode($unit)->getMeasure();
    }

    /**
     * {@inheritdoc}
     */
    public function convert(UnitInterface $unit, UnitInterface $other, $quantity)
    {
        return $this->getNode($unit)->convert($other, $quantity);
    }

    /**
     * @var NodeUnit[]
     */
    private $nodes;

    /**
     * Returns tree unit by name or unit.
     * @param string|UnitInterface
     * @return NodeUnit
     */
    public function getNode($unit)
    {
        $name = $unit instanceof UnitInterface ? $unit->getName() : $unit;

        if (!isset($this->nodes[$name])) {
            $this->nodes[$name] = $this->findNode($name);
        }

        return $this->nodes[$name];
    }

    private function findNode($name)
    {
        $data = $this->findData($name);

        if (isset($data['parent'])) {
            $parent = $data['parent'];
        } else {
            throw new NotConvertibleException("no parent for: $name");
        }

        if ($parent === '') {
            return new RootUnit($this, $name);
        }

        if (isset($data['method'])) {
            $method = $data['method'];
        } elseif (isset($data['factor'])) {
            $method = $data['factor'];
        } else {
            throw new NotConvertibleException("no method for: $name");
        }

        return new NodeUnit($this, $name, $this->getNode($parent), $method);
    }
}
