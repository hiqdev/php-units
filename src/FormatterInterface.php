<?php

namespace hiqdev\php\units;

/**
 * Interface FormatterInterface
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 */
interface FormatterInterface
{
    public function format(Quantity $quantity): string;
}
