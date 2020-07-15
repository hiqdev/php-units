<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tests;

use hiqdev\php\units\Quantity;
use hiqdev\php\units\Unit;

/**
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class QuantityTest extends \PHPUnit\Framework\TestCase
{
    /** @var Quantity */
    protected $some;

    /**
     * @var Quantity
     */
    protected $byte;

    /**
     * @var Quantity
     */
    protected $kilo;

    /**
     * @var Quantity
     */
    protected $mega;

    protected function setUp()
    {
        $this->some = Quantity::some(1);
        $this->byte = Quantity::byte(1);
        $this->kilo = Quantity::kilobyte(1);
        $this->mega = Quantity::megabyte(1);
    }

    public function testGetUnit()
    {
        $this->assertSame(Unit::byte(), $this->byte->getUnit());
        $this->assertSame(Unit::kilobyte(), $this->kilo->getUnit());
        $this->assertSame(Unit::megabyte(), $this->mega->getUnit());
    }

    public function testGetQuantity()
    {
        $this->assertSame(1, $this->byte->getQuantity());
        $this->assertSame(1, $this->kilo->getQuantity());
        $this->assertSame(1, $this->mega->getQuantity());
    }

    public function testCompare()
    {
        $this->assertSame(1, $this->kilo->compare($this->byte));
        $this->assertSame(-1, $this->byte->compare($this->mega));
    }

    public function testEquals()
    {
        $this->assertTrue($this->some->equals($this->some));
        $this->assertTrue($this->byte->equals(Quantity::byte(1)));
        $this->assertTrue($this->kilo->equals(Quantity::KB(1)));
        $this->assertTrue($this->kilo->equals(Quantity::byte(1000)));
        $this->assertTrue(Quantity::KB(1)->equals($this->kilo));
        $this->assertFalse($this->byte->equals($this->kilo));
        $this->assertFalse($this->byte->equals(Quantity::bit(1)));
    }

    public function testIsPositive()
    {
        $this->assertTrue($this->kilo->isPositive());
        $this->assertFalse(Quantity::byte(-1)->isPositive());
    }

    public function testIsNegative()
    {
        $this->assertFalse($this->kilo->isNegative());
        $this->assertTrue(Quantity::byte(-1)->isNegative());
    }

    public function testIsConvertible()
    {
        $this->assertTrue($this->some->isConvertible(Unit::some()));
        $this->assertTrue($this->byte->isConvertible(Unit::KB()));
        $this->assertFalse($this->byte->isConvertible(Unit::meter()));
    }

    public function testConvert()
    {
        $this->assertSame(1, $this->some->convert(Unit::some())->getQuantity());
        $this->assertSame(1, $this->byte->convert(Unit::byte())->getQuantity());
        $this->assertSame(1000, $this->kilo->convert(Unit::byte())->getQuantity());
        $this->assertSame(1000000, $this->mega->convert(Unit::byte())->getQuantity());
        foreach ([$this->byte, $this->kilo, $this->mega] as $value) {
            $this->assertTrue($value->convert(Unit::byte())->getUnit()->equals(Unit::byte()));
        }
        foreach ([Unit::byte(), Unit::kilobyte(), Unit::megabyte()] as $unit) {
            $this->assertTrue($this->byte->convert($unit)->getUnit()->equals($unit));
        }
    }

    public function testAdd()
    {
        $this->assertSame(2, $this->some->add($this->some)->getQuantity());
        $this->assertSame(1001, $this->byte->add($this->kilo)->getQuantity());
        $this->assertSame(1.001, $this->kilo->add($this->byte)->getQuantity());
        $this->assertSame(1.000001, $this->mega->add($this->byte)->getQuantity());
    }

    public function testSubtract()
    {
        $this->assertSame(0, $this->some->subtract($this->some)->getQuantity());
        $this->assertSame(-999, $this->byte->subtract($this->kilo)->getQuantity());
        $this->assertSame(0.999, $this->kilo->subtract($this->byte)->getQuantity());
        $this->assertSame(0.999999, $this->mega->subtract($this->byte)->getQuantity());
    }

    public function testMultiply()
    {
        $this->assertSame(123, $this->some->multiply(123)->getQuantity());
        $this->assertSame(-42, $this->byte->multiply(-42)->getQuantity());
        $this->assertSame(1.3, $this->mega->multiply(1.3)->getQuantity());
    }
}
