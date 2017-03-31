<?php
/**
 * PHP Units of Measure Library.
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tests;

use hiqdev\php\units\Unit;

/**
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class UnitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Unit
     */
    protected $byte;

    /**
     * @var Unit
     */
    protected $kilo;

    /**
     * @var Unit
     */
    protected $mega;

    protected function setUp()
    {
        $this->byte = Unit::byte();
        $this->kilo = Unit::kilobyte();
        $this->mega = Unit::megabyte();
    }

    public function testSame()
    {
        $this->assertSame($this->byte, Unit::byte());
    }

    public function testEquals()
    {
        $this->assertTrue($this->byte->equals(Unit::byte()));
        $this->assertTrue($this->kilo->equals(Unit::KB()));
        $this->assertTrue(Unit::KB()->equals($this->kilo));
        $this->assertFalse($this->byte->equals($this->kilo));
        $this->assertFalse($this->byte->equals(Unit::bit()));
    }

    public function testGetMeasure()
    {
        $this->assertSame('bit', $this->byte->getMeasure());
    }

    public function testIsConvertible()
    {
        $this->assertTrue($this->byte->isConvertible($this->kilo));
        $this->assertFalse($this->byte->isConvertible(Unit::meter()));
    }

    public function testConvert()
    {
        $this->assertSame(1, $this->byte->convert($this->byte, 1));
        $this->assertSame(1, $this->byte->convert($this->kilo, 1000));
        $this->assertSame(1, $this->byte->convert($this->mega, 1000000));
        $this->assertSame(1000, $this->kilo->convert($this->byte, 1));
        $this->assertSame(1000000, $this->mega->convert($this->byte, 1));
    }
}
