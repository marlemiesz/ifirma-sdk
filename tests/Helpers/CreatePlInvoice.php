<?php

namespace Marlemiesz\Ifirma\Tests\Helpers;

use Marlemiesz\Ifirma\Enum\InvoiceIssuingMethodEnum;
use Marlemiesz\Ifirma\Enum\PaymentMethodEnum;
use Marlemiesz\Ifirma\Enum\SaleDateFormatEnum;
use Marlemiesz\Ifirma\Enum\SignatureTypeEnum;
use Marlemiesz\Ifirma\Enum\VatRateEnum;
use Marlemiesz\Ifirma\Model\Client;
use Marlemiesz\Ifirma\Model\Invoice;
use Marlemiesz\Ifirma\Model\InvoicePosition;

class CreatePlInvoice
{
    const INVOICE = [
        'amount_paid' => 100.12,
        'amount_paid_in_invoice' => 100.12,
        'invoice_issuing_method' => InvoiceIssuingMethodEnum::brutto,
        'issue_date' => '2021-01-01',
        'sale_date' => '2021-01-01',
        'sale_date_format' => SaleDateFormatEnum::daily,
        'payment_method' => PaymentMethodEnum::cash,
        'signature_type' => SignatureTypeEnum::BPO,
        'visible_gios_number' => true,
        'series_name' => 'coretest',
    ];
    
    const CLIENT = [
        'name' => 'Test Client',
        'postal_code' => '00-000',
        'city' => 'Test City',
        'is_physical_person' => false,
        'ue_prefix' => 'PL',
        'nip' => '1234567890',
        'street' => 'Test Street',
    ];
    
    const INVOICE_POSITIONS = [
        [
            'name' => 'Test position',
            'unit' => 'szt',
            'quantity' => 1,
            'price' => 100.12,
            'tax' => VatRateEnum::twentyThree,
            'discount' => 0,
        ],
    ];
    
    public static function prepareInvoicePositions(): array
    {
        $positions = [];
        foreach (self::INVOICE_POSITIONS as $position) {
            $positions[] = new InvoicePosition(
                vatRate: $position['tax'],
                quantity: $position['quantity'],
                unitPrice: $position['price'],
                name: $position['name'],
                unit: $position['unit'],
            );
        }
        
        return $positions;
    }
    
    public static function prepareClient(): Client
    {
        return new Client(
            name: self::CLIENT['name'],
            postalCode: self::CLIENT['postal_code'],
            city: self::CLIENT['city'],
            isPhysicalPerson: self::CLIENT['is_physical_person'],
            uePrefix: self::CLIENT['ue_prefix'],
            nip: self::CLIENT['nip'],
            street: self::CLIENT['street'],
        );
    }
    
    public static function prepareInvoice(): Invoice
    {
        return new Invoice(
            amount_paid: self::INVOICE['amount_paid'],
            amount_paid_in_invoice: self::INVOICE['amount_paid_in_invoice'],
            invoice_issuing_method: self::INVOICE['invoice_issuing_method'],
            issue_date: new \DateTime(self::INVOICE['issue_date']),
            sale_date: new \DateTime(self::INVOICE['sale_date']),
            sale_date_format: self::INVOICE['sale_date_format'],
            payment_method: self::INVOICE['payment_method'],
            signature_type: self::INVOICE['signature_type'],
            visible_gios_number: self::INVOICE['visible_gios_number'],
            client: self::prepareClient(),
            positions: self::prepareInvoicePositions(),
            series_name: self::INVOICE['series_name'],
        );
    }
}
