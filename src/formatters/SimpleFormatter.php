<?php

namespace hiqdev\php\units\formatters;

use hiqdev\php\units\FormatterInterface;
use hiqdev\php\units\Quantity;

/**
 * Class SimpleFormatter
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 */
class SimpleFormatter implements FormatterInterface
{
    /**
     * @param Quantity $quantity
     * @return string
     */
    public function format(Quantity $quantity): string
    {
        return $this->formatQuantity($quantity) . ' ' . $quantity->getUnit()->getName();
    }

    /**
     * @param Quantity $quantity
     * @return string
     */
    private function formatQuantity(Quantity $quantity): string
    {
        $value = (float)$quantity->getQuantity();

        return rtrim(rtrim(number_format($value, 6, '.', ' '), '0'), '.');
    }
}
