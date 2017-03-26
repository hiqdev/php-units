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

use hiqdev\php\units\tree\TreeConverter;

/**
 * Unit of measure. E.g.
 *
 * - bit, byte, kilobyte, ...
 * - mm, cm, km, ..., inch, yard, foot, ....
 *
 * @see UnitInterface
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Unit implements UnitInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ConverterInterface
     */
    private $converter;

    private function __construct($name, ConverterInterface $converter)
    {
        $this->name = $name;
        $this->converter = $converter;
    }

    /**
     * {@inheritdoc}
     */
    final public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    final public function getMeasure()
    {
        return $this->getConverter()->getMeasure($this);
    }

    /**
     * {@inheritdoc}
     */
    final public function equals(UnitInterface $other)
    {
        return $this->getConverter()->equals($this, $other);
    }

    private function getConverter()
    {
        return $this->converter;
    }

    /**
     * {@inheritdoc}
     */
    final public function isConvertible(UnitInterface $other)
    {
        return $this->getConverter()->isConvertible($this, $other);
    }

    /**
     * {@inheritdoc}
     */
    final public function convert(UnitInterface $other, $quantity)
    {
        return $this->getConverter()->convert($this, $other, $quantity);
    }

    /**
     * @var Unit[]
     */
    private static $units;

    final public static function __callStatic($name, $args)
    {
        if (!isset(static::$units[$name])) {
            static::$units[$name] = new static($name, static::findConverter());
        }

        return static::$units[$name];
    }

    private static $defaultConverter;

    protected static function findConverter()
    {
        if (empty(static::$defaultConverter)) {
            static::$defaultConverter = static::findDefaultConverter();
        }

        return static::$defaultConverter;
    }

    protected static function findDefaultConverter()
    {
        return new TreeConverter();
    }
}
