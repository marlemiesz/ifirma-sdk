<?php

namespace Marlemiesz\Ifirma\Enum;

enum VatRateEnum
{
    case zero;
    case five;
    case eight;
    case twentyThree;
    
    public function toFloat(): float
    {
        return match ($this) {
            self::zero => 0.0,
            self::five => 0.05,
            self::eight => 0.08,
            self::twentyThree => 0.23,
        };
    }
}
