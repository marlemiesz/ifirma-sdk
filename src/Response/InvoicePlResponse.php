<?php

namespace Marlemiesz\Ifirma\Response;

use Marlemiesz\Ifirma\Exceptions\ApiException;

class InvoicePlResponse implements ResponseInterface
{
    private function __construct(
        private int $code,
        private string $message,
        private int|null $invoiceId,
    ) {
        if ($this->code !== 0) {
            throw new ApiException($this->message, $this->code);
        }
    }
    
    public static function fromPrimitive(array $response): static
    {
        return new self(
            $response['response']['Kod'],
            $response['response']['Informacja'],
            $response['response']['Identyfikator'],
        );
    }
    
    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
    
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    
    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }
    
    public function isSuccess(): bool
    {
        return $this->code === 0;
    }
}
