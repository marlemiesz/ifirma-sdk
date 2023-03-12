<?php

namespace Marlemiesz\Ifirma\Model;

use Marlemiesz\Ifirma\Enum\VatRateEnum;
use Marlemiesz\Ifirma\Enum\VatTypeEnum;

class InvoicePosition implements ModelInterface
{
    
    public function __construct(
        private VatRateEnum  $vatRate,
        private int    $quantity,
        private float  $unitPrice,
        private string $name,
        private string $unit,
        private VatTypeEnum $vatType = VatTypeEnum::PRC,
        private ?string $pkwiu = null,
    )
    {
    }
    
    /**
     * @return VatRateEnum
     */
    public function getVatRate(): VatRateEnum
    {
        return $this->vatRate;
    }
    
    /**
     * @param VatRateEnum $vatRate
     */
    public function setVatRate(VatRateEnum $vatRate): void
    {
        $this->vatRate = $vatRate;
    }
    
    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    
    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }
    
    /**
     * @param float $unitPrice
     */
    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
    
    /**
     * @param string $unit
     */
    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }
    
    /**
     * @return VatTypeEnum
     */
    public function getVatType(): VatTypeEnum
    {
        return $this->vatType;
    }
    
    /**
     * @param VatTypeEnum $vatType
     */
    public function setVatType(VatTypeEnum $vatType): void
    {
        $this->vatType = $vatType;
    }
    
    /**
     * @return string|null
     */
    public function getPkwiu(): ?string
    {
        return $this->pkwiu;
    }
    
    /**
     * @param string|null $pkwiu
     */
    public function setPkwiu(?string $pkwiu): void
    {
        $this->pkwiu = $pkwiu;
    }
    public function toPrimitive(): array
    {
        return [
            'vatRate' => $this->vatRate->getValue(),
            'quantity' => $this->quantity,
            'unitPrice' => $this->unitPrice,
            'name' => $this->name,
            'unit' => $this->unit,
            'vatType' => $this->vatType->getValue(),
            'pkwiu' => $this->pkwiu,
        ];
    }
}
