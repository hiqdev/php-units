<?php

namespace hiqdev\php\units\tests\formatters;

use hiqdev\php\units\formatters\SimpleFormatter;
use hiqdev\php\units\Quantity;
use PHPUnit\Framework\TestCase;

/**
 * Class SimpleFormatterTest
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 */
class SimpleFormatterTest extends TestCase
{
    /**
     * @var SimpleFormatter
     */
    protected $formatter;

    public function setUp()
    {
        $this->formatter = new SimpleFormatter();
    }

    /**
     * @dataProvider quantitiesProvider
     *
     * @param Quantity $quantity
     * @param string $expected
     */
    public function testFormats(Quantity $quantity, string $expected): void
    {
        $this->assertSame($expected, $this->formatter->format($quantity));
    }

    public function quantitiesProvider(): array
    {
        return [
            [Quantity::create('mb', 100), '100 mb'],
            [Quantity::create('mb', 10000), '10 000 mb'],
            [Quantity::create('wtf', 100500), '100 500 wtf'],
            [Quantity::create('min', 60.14), '60.14 min'],
            [Quantity::create('item', 0.00001), '0.00001 item'],
        ];
    }
}
