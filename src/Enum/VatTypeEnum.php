<?php

namespace Marlemiesz\Ifirma\Enum;

enum VatTypeEnum
{
    //PRC (procentowa);
    //ZW (zwolniona)
    case PRC;
    case ZW;
    
    public function getValue(): string
    {
        return match ($this) {
            self::PRC => 'PRC',
            self::ZW => 'ZW',
        };
    }
}
