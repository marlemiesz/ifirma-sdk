<?php

namespace Marlemiesz\Ifirma\Model;

use Marlemiesz\Ifirma\Enum\InvoiceIssuingMethodEnum;
use Marlemiesz\Ifirma\Enum\PaymentMethodEnum;
use Marlemiesz\Ifirma\Enum\SaleDateFormatEnum;
use Marlemiesz\Ifirma\Enum\SignatureTypeEnum;

class Invoice implements ModelInterface
{
    public function __construct(
        private float                    $amount_paid,
        private float                    $amount_paid_in_invoice,
        private InvoiceIssuingMethodEnum $invoice_issuing_method,
        private \DateTime                $issue_date,
        private \DateTime                $sale_date,
        private SaleDateFormatEnum       $sale_date_format,
        private PaymentMethodEnum        $payment_method,
        private SignatureTypeEnum        $signature_type,
        private bool                     $visible_gios_number,
        private Client                   $client,
        private array                    $positions,
        private ?string                  $bank_account_number = null,
        private ?string                  $place_of_issue = null,
        private \DateTime|null           $payment_deadline = null,
        private string|null              $series_name = null,
        private string|null              $template_name = null,
        private string|null              $signature_recipient = null,
        private string|null              $signature_issuer = null,
        private string|null              $notes = null,
        private ?string                  $number = null,
    ) {
        $this->validPositions();
    }
    
    /**
     * @return float
     */
    public function getAmountPaid(): float
    {
        return $this->amount_paid;
    }
    
    /**
     * @param float $amount_paid
     */
    public function setAmountPaid(float $amount_paid): void
    {
        $this->amount_paid = $amount_paid;
    }
    
    /**
     * @return float
     */
    public function getAmountPaidInInvoice(): float
    {
        return $this->amount_paid_in_invoice;
    }
    
    /**
     * @param float $amount_paid_in_invoice
     */
    public function setAmountPaidInInvoice(float $amount_paid_in_invoice): void
    {
        $this->amount_paid_in_invoice = $amount_paid_in_invoice;
    }
    
    /**
     * @return InvoiceIssuingMethodEnum
     */
    public function getInvoiceIssuingMethod(): InvoiceIssuingMethodEnum
    {
        return $this->invoice_issuing_method;
    }
    
    /**
     * @param InvoiceIssuingMethodEnum $invoice_issuing_method
     */
    public function setInvoiceIssuingMethod(InvoiceIssuingMethodEnum $invoice_issuing_method): void
    {
        $this->invoice_issuing_method = $invoice_issuing_method;
    }
    
    /**
     * @return \DateTime
     */
    public function getIssueDate(): \DateTime
    {
        return $this->issue_date;
    }
    
    /**
     * @param \DateTime $issue_date
     */
    public function setIssueDate(\DateTime $issue_date): void
    {
        $this->issue_date = $issue_date;
    }
    
    /**
     * @return \DateTime
     */
    public function getSaleDate(): \DateTime
    {
        return $this->sale_date;
    }
    
    /**
     * @param \DateTime $sale_date
     */
    public function setSaleDate(\DateTime $sale_date): void
    {
        $this->sale_date = $sale_date;
    }
    
    /**
     * @return SaleDateFormatEnum
     */
    public function getSaleDateFormat(): SaleDateFormatEnum
    {
        return $this->sale_date_format;
    }
    
    /**
     * @param SaleDateFormatEnum $sale_date_format
     */
    public function setSaleDateFormat(SaleDateFormatEnum $sale_date_format): void
    {
        $this->sale_date_format = $sale_date_format;
    }
    
    /**
     * @return PaymentMethodEnum
     */
    public function getPaymentMethod(): PaymentMethodEnum
    {
        return $this->payment_method;
    }
    
    /**
     * @param PaymentMethodEnum $payment_method
     */
    public function setPaymentMethod(PaymentMethodEnum $payment_method): void
    {
        $this->payment_method = $payment_method;
    }
    
    /**
     * @return SignatureTypeEnum
     */
    public function getSignatureType(): SignatureTypeEnum
    {
        return $this->signature_type;
    }
    
    /**
     * @param SignatureTypeEnum $signature_type
     */
    public function setSignatureType(SignatureTypeEnum $signature_type): void
    {
        $this->signature_type = $signature_type;
    }
    
    /**
     * @return bool
     */
    public function isVisibleGiosNumber(): bool
    {
        return $this->visible_gios_number;
    }
    
    /**
     * @param bool $visible_gios_number
     */
    public function setVisibleGiosNumber(bool $visible_gios_number): void
    {
        $this->visible_gios_number = $visible_gios_number;
    }
    
    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
    
    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }
    
    /**
     * @return string|null
     */
    public function getBankAccountNumber(): ?string
    {
        return $this->bank_account_number;
    }
    
    /**
     * @param string|null $bank_account_number
     */
    public function setBankAccountNumber(?string $bank_account_number): void
    {
        $this->bank_account_number = $bank_account_number;
    }
    
    /**
     * @return string|null
     */
    public function getPlaceOfIssue(): ?string
    {
        return $this->place_of_issue;
    }
    
    /**
     * @param string|null $place_of_issue
     */
    public function setPlaceOfIssue(?string $place_of_issue): void
    {
        $this->place_of_issue = $place_of_issue;
    }
    
    /**
     * @return \DateTime|null
     */
    public function getPaymentDeadline(): ?\DateTime
    {
        return $this->payment_deadline;
    }
    
    /**
     * @param \DateTime|null $payment_deadline
     */
    public function setPaymentDeadline(?\DateTime $payment_deadline): void
    {
        $this->payment_deadline = $payment_deadline;
    }
    
    /**
     * @return string|null
     */
    public function getSeriesName(): ?string
    {
        return $this->series_name;
    }
    
    /**
     * @param string|null $series_name
     */
    public function setSeriesName(?string $series_name): void
    {
        $this->series_name = $series_name;
    }
    
    /**
     * @return string|null
     */
    public function getTemplateName(): ?string
    {
        return $this->template_name;
    }
    
    /**
     * @param string|null $template_name
     */
    public function setTemplateName(?string $template_name): void
    {
        $this->template_name = $template_name;
    }
    
    /**
     * @return string|null
     */
    public function getSignatureRecipient(): ?string
    {
        return $this->signature_recipient;
    }
    
    /**
     * @param string|null $signature_recipient
     */
    public function setSignatureRecipient(?string $signature_recipient): void
    {
        $this->signature_recipient = $signature_recipient;
    }
    
    /**
     * @return string|null
     */
    public function getSignatureIssuer(): ?string
    {
        return $this->signature_issuer;
    }
    
    /**
     * @param string|null $signature_issuer
     */
    public function setSignatureIssuer(?string $signature_issuer): void
    {
        $this->signature_issuer = $signature_issuer;
    }
    
    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }
    
    /**
     * @param string|null $notes
     */
    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }
    
    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }
    
    /**
     * @param string|null $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }
    
    
    /**
     * @return array
     */
    public function getPositions(): array
    {
        return $this->positions;
    }
    
    /**
     * @param array $positions
     */
    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
        $this->validPositions();
    }
    
    protected function validPositions(): bool
    {
        $valid = true;
        foreach ($this->positions as $position) {
            if (!$position instanceof InvoicePosition) {
                throw new \InvalidArgumentException('Positions must be an array of InvoicePosition objects');
            }
        }
        return true;
    }
    
    public function toPrimitive(): array
    {
        $positions = [];
        foreach ($this->positions as $position) {
            $positions[] = $position->toPrimitive();
        }
        return [
            'DataWystawienia' => $this->issue_date->format('Y-m-d'),
            'FormatDatySprzedazy' => $this->sale_date_format->getValue(),
            'DataSprzedazy' => $this->getSaleDatePrimitive(),
            'SposobZaplaty' => $this->payment_method->getValue(),
            'RodzajPodpisuOdbiorcy' => $this->signature_type->getValue(),
            'WidocznyNumerGios' => $this->visible_gios_number,
            'Kontrahent' => $this->client->toPrimitive(),
            'NumerKontaBankowego' => $this->bank_account_number,
            'MiejsceWystawienia' => $this->place_of_issue,
            'TerminPlatnosci' => $this->payment_deadline ? $this->payment_deadline->format('Y-m-d') : null,
            'NazwaSeriiNumeracji' => $this->series_name,
            'NazwaSzablonu' => $this->template_name,
            'PodpisOdbiorcy' => $this->signature_recipient,
            'PodpisWystawcy' => $this->signature_issuer,
            'Uwagi' => $this->notes,
            'Numer' => $this->number,
            'Pozycje' => $positions,
            'LiczOd' => $this->invoice_issuing_method->getValue(),
        ];
    }
    
    /**
     * @return string
     */
    protected function getSaleDatePrimitive(): string
    {
        return
            $this->sale_date_format === SaleDateFormatEnum::monthly
                ?
                $this->sale_date->format('Y-m')
                :
                $this->sale_date->format('Y-m-d')
            ;
    }
}
