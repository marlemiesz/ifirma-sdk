<?php

namespace Marlemiesz\Ifirma;

use Marlemiesz\Ifirma\HttpClient\GuzzleClient;
use Marlemiesz\Ifirma\Model\Invoice;
use Marlemiesz\Ifirma\Request\InvoicePlRequest;
use Marlemiesz\Ifirma\Response\ResponseInterface;

class Api
{
    private GuzzleClient $client;
    
    public function __construct(
        readonly string $apiUser,
        readonly string $apiInvoiceKey,
    )
    {
        $this->client = new GuzzleClient($apiUser, $apiInvoiceKey);
    }
    
    public function createPlInvoice(Invoice $invoice): ResponseInterface
    {
        return $this->client->call(new InvoicePlRequest($invoice));
    }
}
