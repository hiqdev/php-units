<?php

namespace hiqdev\php\units\yii2\formatters;

use hiqdev\php\units\FormatterInterface;
use hiqdev\php\units\formatters\SimpleFormatter;
use hiqdev\php\units\Quantity;
use hiqdev\php\units\Unit;
use Yii;
use yii\i18n\Formatter;

/**
 * Class IntlFormatter
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 */
class IntlFormatter implements FormatterInterface
{
    /**
     * @var SimpleFormatter
     */
    protected $simpleFormatter;
    /**
     * @var Formatter
     */
    private $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
        $this->simpleFormatter = new SimpleFormatter();
    }

    /**
     * @param Quantity $quantity
     * @return string
     */
    public function format(Quantity $quantity): string
    {
        $format = $this->formatter;
        $format->sizeFormatBase = 1000;

        // TODO: split to different classes
        switch ($quantity->getUnit()->getMeasure()) {
            case 'bit':
                return $format->asShortSize($quantity->convert(Unit::create('byte'))->getQuantity(), 2);
            case 'bps':
                return Yii::t('hiqdev.units', '{quantity, number} {unit}', [
                    'quantity' => $quantity->getQuantity(),
                    'unit' => (function (string $unitName) {
                        switch ($unitName) {
                            case 'bps': return Yii::t('hiqdev.units', 'b/s');
                            case 'kbps': return Yii::t('hiqdev.units', 'Kb/s');
                            case 'mbps': return Yii::t('hiqdev.units', 'Mb/s');
                            case 'gbps': return Yii::t('hiqdev.units', 'Gb/s');
                        }
                        return Yii::t('hiqdev.units', '');
                    })($quantity->getUnit()->getName())
                ]);
            case 'item':
                return Yii::t('hiqdev.units', '{quantity, plural, one{# item} other{# items}}', ['quantity' => $quantity->getQuantity()]);
        }

        return $this->simpleFormatter->format($quantity);
    }
}
