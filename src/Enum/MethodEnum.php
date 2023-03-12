<?php

namespace Marlemiesz\Ifirma\Enum;

enum MethodEnum
{
    case GET;
    case POST;
    case PUT;
    case DELETE;
    
    public function getValue() : string
    {
        return match ($this) {
            self::GET => 'GET',
            self::POST => 'POST',
            self::PUT => 'PUT',
            self::DELETE => 'DELETE',
        };
    }
}
