<?php

namespace Marlemiesz\Ifirma\Enum;

enum PaymentMethodEnum
{
    case cash;
    case cod;
    case transfer;
    case card;
    case directDebit;
    case check;
    case compensation;
    case barter;
    case dotpay;
    case paypal;
    case payu;
    case przelewy24;
    case tpay;
    case electronicPayment;
    
    public function getValue():string{
        return match ($this) {
            self::cash => 'GTK',
            self::cod => 'POB',
            self::transfer => 'PRZ',
            self::card => 'KAR',
            self::directDebit => 'PZA',
            self::check => 'CZK',
            self::compensation => 'KOM',
            self::barter => 'BAR',
            self::dotpay => 'DOT',
            self::paypal => 'PAL',
            self::payu => 'ALG',
            self::przelewy24 => 'P24',
            self::tpay => 'TPA',
            self::electronicPayment => 'ELE',
        };
    }
    
}
