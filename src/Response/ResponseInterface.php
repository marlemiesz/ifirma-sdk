<?php

namespace Marlemiesz\Ifirma\Response;

interface ResponseInterface
{
    public static function fromPrimitive(array $response): static;
}
