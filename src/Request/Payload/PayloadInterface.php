<?php

namespace Marlemiesz\Ifirma\Request\Payload;

interface PayloadInterface
{
    public function fromPrimitive(array $data): PayloadInterface;
    public function toPrimitive(): array;
}
