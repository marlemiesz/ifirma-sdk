<?php

namespace Marlemiesz\Ifirma\Request;

use Marlemiesz\Ifirma\Enum\KeyNameEnum;
use Marlemiesz\Ifirma\Enum\MethodEnum;
use Marlemiesz\Ifirma\Model\Invoice;
use Marlemiesz\Ifirma\Request\Payload\PayloadInterface;
use Marlemiesz\Ifirma\Response\InvoicePlResponse;
use Marlemiesz\Ifirma\Response\ResponseInterface;

class InvoicePlRequest implements RequestInterface
{
    const URI = '/iapi/fakturakraj.json';
    
    public function __construct(
        readonly Invoice $invoice
    ) {
    }
    
    public function getUri(): string
    {
        return self::URI;
    }
    
    public function getKeyName(): KeyNameEnum
    {
        return KeyNameEnum::Invoice;
    }
    
    public function getMethod(): MethodEnum
    {
        return MethodEnum::POST;
    }
    
    public function getPayload(): Invoice|null
    {
        return $this->invoice;
    }
    
    public function prepareResponse(array $response): ResponseInterface
    {
        return InvoicePlResponse::fromPrimitive($response);
    }
}
