<?php

namespace Marlemiesz\Ifirma\Model;

class InvoicePosition
{
    
    public function __construct(
        private float  $vatRate,
        private int    $quantity,
        private float  $unitPrice,
        private string $name,
        private string $unit,
        private string $pkwiu,
        private string $vatType
    )
    {
    }
    
    /**
     * @return float
     */
    public function getVatRate(): float
    {
        return $this->vatRate;
    }
    
    /**
     * @param float $vatRate
     */
    public function setVatRate(float $vatRate): void
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
     * @return string
     */
    public function getPkwiu(): string
    {
        return $this->pkwiu;
    }
    
    /**
     * @param string $pkwiu
     */
    public function setPkwiu(string $pkwiu): void
    {
        $this->pkwiu = $pkwiu;
    }
    
    /**
     * @return string
     */
    public function getVatType(): string
    {
        return $this->vatType;
    }
    
    /**
     * @param string $vatType
     */
    public function setVatType(string $vatType): void
    {
        $this->vatType = $vatType;
    }
}
