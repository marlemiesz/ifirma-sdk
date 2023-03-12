<?php

namespace Marlemiesz\Ifirma\Model;

class Invoice
{
    public function __construct(
        private int     $amount_paid,
        private string  $numbering_from,
        private ?string $bank_account_number,
        private string  $issue_date,
        private string  $place_of_issue,
        private string  $sale_date,
        private string  $sale_date_format,
        private ?string $payment_deadline,
        private string  $payment_method,
        private string  $series_name,
        private string  $template_name,
        private string  $signature_type,
        private string  $signature_recipient,
        private string  $signature_issuer,
        private string  $notes,
        private bool    $visible_gios_number,
        private ?string $number,
        private Client  $client,
        private array   $positions
    )
    {
        $this->validPositions();
    }
    
    /**
     * @return int
     */
    public function getAmountPaid(): int
    {
        return $this->amount_paid;
    }
    
    /**
     * @param int $amount_paid
     */
    public function setAmountPaid(int $amount_paid): void
    {
        $this->amount_paid = $amount_paid;
    }
    
    /**
     * @return string
     */
    public function getNumberingFrom(): string
    {
        return $this->numbering_from;
    }
    
    /**
     * @param string $numbering_from
     */
    public function setNumberingFrom(string $numbering_from): void
    {
        $this->numbering_from = $numbering_from;
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
     * @return string
     */
    public function getIssueDate(): string
    {
        return $this->issue_date;
    }
    
    /**
     * @param string $issue_date
     */
    public function setIssueDate(string $issue_date): void
    {
        $this->issue_date = $issue_date;
    }
    
    /**
     * @return string
     */
    public function getPlaceOfIssue(): string
    {
        return $this->place_of_issue;
    }
    
    /**
     * @param string $place_of_issue
     */
    public function setPlaceOfIssue(string $place_of_issue): void
    {
        $this->place_of_issue = $place_of_issue;
    }
    
    /**
     * @return string
     */
    public function getSaleDate(): string
    {
        return $this->sale_date;
    }
    
    /**
     * @param string $sale_date
     */
    public function setSaleDate(string $sale_date): void
    {
        $this->sale_date = $sale_date;
    }
    
    /**
     * @return string
     */
    public function getSaleDateFormat(): string
    {
        return $this->sale_date_format;
    }
    
    /**
     * @param string $sale_date_format
     */
    public function setSaleDateFormat(string $sale_date_format): void
    {
        $this->sale_date_format = $sale_date_format;
    }
    
    /**
     * @return string|null
     */
    public function getPaymentDeadline(): ?string
    {
        return $this->payment_deadline;
    }
    
    /**
     * @param string|null $payment_deadline
     */
    public function setPaymentDeadline(?string $payment_deadline): void
    {
        $this->payment_deadline = $payment_deadline;
    }
    
    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }
    
    /**
     * @param string $payment_method
     */
    public function setPaymentMethod(string $payment_method): void
    {
        $this->payment_method = $payment_method;
    }
    
    /**
     * @return string
     */
    public function getSeriesName(): string
    {
        return $this->series_name;
    }
    
    /**
     * @param string $series_name
     */
    public function setSeriesName(string $series_name): void
    {
        $this->series_name = $series_name;
    }
    
    /**
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->template_name;
    }
    
    /**
     * @param string $template_name
     */
    public function setTemplateName(string $template_name): void
    {
        $this->template_name = $template_name;
    }
    
    /**
     * @return string
     */
    public function getSignatureType(): string
    {
        return $this->signature_type;
    }
    
    /**
     * @param string $signature_type
     */
    public function setSignatureType(string $signature_type): void
    {
        $this->signature_type = $signature_type;
    }
    
    /**
     * @return string
     */
    public function getSignatureRecipient(): string
    {
        return $this->signature_recipient;
    }
    
    /**
     * @param string $signature_recipient
     */
    public function setSignatureRecipient(string $signature_recipient): void
    {
        $this->signature_recipient = $signature_recipient;
    }
    
    /**
     * @return string
     */
    public function getSignatureIssuer(): string
    {
        return $this->signature_issuer;
    }
    
    /**
     * @param string $signature_issuer
     */
    public function setSignatureIssuer(string $signature_issuer): void
    {
        $this->signature_issuer = $signature_issuer;
    }
    
    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }
    
    /**
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
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
}
