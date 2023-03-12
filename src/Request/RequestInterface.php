<?php

namespace Marlemiesz\Ifirma\Request;


use Marlemiesz\Ifirma\Enum\KeyNameEnum;
use Marlemiesz\Ifirma\Enum\MethodEnum;
use Marlemiesz\Ifirma\Model\ModelInterface;
use Marlemiesz\Ifirma\Request\Payload\PayloadInterface;
use Marlemiesz\Ifirma\Response\ResponseInterface;

interface RequestInterface
{
    public function getUri(): string;
    
    public function getKeyName(): KeyNameEnum;
    
    public function getMethod(): MethodEnum;
    
    public function getPayload(): ModelInterface | null;
    
    public function prepareResponse(array $response): ResponseInterface;
    
    
}
