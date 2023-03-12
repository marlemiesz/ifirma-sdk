<?php
namespace Marlemiesz\Ifirma\Tests;
use Marlemiesz\Ifirma\Api;
use Marlemiesz\Ifirma\Tests\Helpers\CreatePlInvoice;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    const envFile = __DIR__ . '/../.env.test';
    
    private Api $api;
    
    private function validateEnv(): void
    {
        if(!file_exists(self::envFile)) {
            $this->markTestSkipped('No .env file found');
        }
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../', '.env.test');
        $dotenv->load();
        if(!isset($_ENV['IFIRMA_USER']) && $_ENV['IFIRMA_INVOICE_TOKEN'] !== '') {
            $this->markTestSkipped('Please set IFIRMA_USER and IFIRMA_INVOICE_TOKEN in your .env file');
        }
    }
    protected function setUp(): void
    {
        parent::setUp();
        $this->validateEnv();
        $this->api = new Api($_ENV['IFIRMA_USER'], $_ENV['IFIRMA_INVOICE_TOKEN']);
    }
    
    public function testCreatePlInvoice(){
        $invoice = CreatePlInvoice::prepareInvoice();
        
        $this->api->createPlInvoice($invoice);
        
    }
    
    
}
