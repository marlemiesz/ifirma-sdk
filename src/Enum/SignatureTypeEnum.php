<?php

namespace Marlemiesz\Ifirma\Enum;

enum SignatureTypeEnum
{
    //OUP (osoba upoważniona do otrzymania faktury VAT);
    //UPO (upoważnienie);
    //BPO (bez podpisu odbiorcy);
    //BWO (bez podpisu odbiorcy i wystawcy)
    
    case OUP;
    case UPO;
    case BPO;
    case BWO;
    
    public function getValue(): string
    {
        return match ($this) {
            self::OUP => 'OUP',
            self::UPO => 'UPO',
            self::BPO => 'BPO',
            self::BWO => 'BWO',
        };
    }
}
