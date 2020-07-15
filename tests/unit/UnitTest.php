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

use hiqdev\php\units\Unit;

/**
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class UnitTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        $this->bit  = Unit::bit();
        $this->byte = Unit::byte();
        $this->kilo = Unit::kilobyte();
        $this->mega = Unit::megabyte();
        $this->giga = Unit::gigabyte();
        $this->kb   = Unit::kb();
        $this->mb   = Unit::mb();
        $this->gb   = Unit::gb();

        $this->bps  = Unit::bps();
        $this->kbps = Unit::kbps();
        $this->mbps = Unit::mbps();
        $this->gbps = Unit::gbps();

        $this->minute = Unit::minute();
        $this->min  = Unit::min();
        $this->hour = Unit::hour();
        $this->day  = Unit::day();
        $this->week = Unit::week();

        $this->usd  = Unit::usd();
        $this->eur  = Unit::eur();
    }

    public function testSame()
    {
        $this->assertSame($this->byte, Unit::byte());
        $this->assertSame($this->usd, Unit::usd());
        $this->assertSame($this->eur, Unit::eur());
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
        $this->assertConvert(1, $this->min, $this->minute);
        $this->assertConvert(60, $this->min, $this->hour);
        $this->assertConvert(24, $this->hour, $this->day);
        $this->assertConvert(7, $this->day, $this->week);

        $this->assertConvert(8, $this->bit, $this->byte);
        $this->assertConvert(1000, $this->byte, $this->kilo);
        $this->assertConvert(1000000, $this->byte, $this->mega);
        $this->assertConvert(1000000000, $this->byte, $this->giga);

        $this->assertConvert(1000, $this->byte, $this->kb);
        $this->assertConvert(1000000, $this->byte, $this->mb);
        $this->assertConvert(1000000000, $this->byte, $this->gb);

        $this->assertConvert(1000, $this->bps, $this->kbps);
        $this->assertConvert(1000000, $this->bps, $this->mbps);
        $this->assertConvert(1000000000, $this->bps, $this->gbps);
    }

    protected function assertConvert($factor, Unit $lesser, Unit $bigger)
    {
        $this->assertSame(1, $lesser->convert($lesser, 1));
        $this->assertSame(1, $bigger->convert($bigger, 1));

        $this->assertSame(1, $lesser->convert($bigger, $factor));
        $this->assertSame($factor, $bigger->convert($lesser, 1));
    }

    public function testConvertThroughRoot()
    {
        $this->assertConvert(1440, $this->minute, $this->day);
        $this->assertConvert(1000, $this->mb, $this->gb);
    }

    public function testUnknownUnit()
    {
        $unknown = Unit::create('unknown');
        $this->assertInstanceOf(Unit::class, $unknown);
    }
}
