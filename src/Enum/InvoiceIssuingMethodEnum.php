<?php

namespace Marlemiesz\Ifirma\Enum;

enum InvoiceIssuingMethodEnum
{
    case netto;
    case brutto;
    
    public function getValue(): string
    {
        return match ($this) {
            self::netto => 'NET',
            self::brutto => 'BRT',
        };
    }
}
