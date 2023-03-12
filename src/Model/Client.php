<?php

namespace Marlemiesz\Ifirma\Model;


class Client implements ModelInterface
{
    
    public function __construct(
        private string  $name,
        private string  $postalCode,
        private string  $city,
        private bool    $isPhysicalPerson = false,
        private ?string $identifier = null,
        private ?string $email = null,
        private ?string $phone = null,
        private ?string $country = null,
        private ?string $uePrefix = null,
        private ?string $nip = null,
        private ?string $street = null,
    
    )
    {
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
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }
    
    /**
     * @param string|null $identifier
     */
    public function setIdentifier(?string $identifier): void
    {
        $this->identifier = $identifier;
    }
    
    /**
     * @return string
     */
    public function getUePrefix(): string
    {
        return $this->uePrefix;
    }
    
    /**
     * @param string $uePrefix
     */
    public function setUePrefix(string $uePrefix): void
    {
        $this->uePrefix = $uePrefix;
    }
    
    /**
     * @return string
     */
    public function getNip(): string
    {
        return $this->nip;
    }
    
    /**
     * @param string $nip
     */
    public function setNip(string $nip): void
    {
        $this->nip = $nip;
    }
    
    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }
    
    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }
    
    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }
    
    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }
    
    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
    
    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
    
    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
    
    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    
    /**
     * @return bool
     */
    public function isPhysicalPerson(): bool
    {
        return $this->isPhysicalPerson;
    }
    
    /**
     * @param bool $isPhysicalPerson
     */
    public function setIsPhysicalPerson(bool $isPhysicalPerson): void
    {
        $this->isPhysicalPerson = $isPhysicalPerson;
    }
    
    public function toPrimitive(): array
    {
        return [
            'name'             => $this->name,
            'postalCode'       => $this->postalCode,
            'city'             => $this->city,
            'isPhysicalPerson' => $this->isPhysicalPerson,
            'identifier'       => $this->identifier,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'country'          => $this->country,
            'uePrefix'         => $this->uePrefix,
            'nip'              => $this->nip,
            'street'           => $this->street,
        ];
    }
}
