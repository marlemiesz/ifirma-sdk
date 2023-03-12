<?php

namespace Marlemiesz\Ifirma\Enum;

enum KeyNameEnum
{
    case Invoice;
    
    case Subscription;
    
    case Expense;
    
    case Account;
    
    public function getValue() : string
    {
        return match ($this) {
            self::Invoice => 'faktura',
            self::Subscription => 'abonent',
            self::Expense => 'rachunek',
            self::Account => 'wydatek',
        };
    }
}
