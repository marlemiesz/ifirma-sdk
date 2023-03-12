<?php

namespace Marlemiesz\Ifirma\Enum;

enum SaleDateFormatEnum
{
    case daily;
    case monthly;
    
    public function getValue(): string
    {
        return match ($this) {
            self::daily => 'DZN',
            self::monthly => 'MSC',
        };
    }
}
