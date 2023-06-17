<?php

namespace Marlemiesz\Ifirma\Exceptions;

class ApiException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    
    public function __toString(): string
    {
        return "Ifirma Api Exception: [{$this->code}]: {$this->message}\n";
    }
    
    public function getMessages(): string
    {
        return "Ifirma Api Exception: [{$this->code}]: {$this->message}\n";
    }
}
