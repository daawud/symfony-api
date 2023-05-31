<?php

declare(strict_types = 1);

namespace App\Products\Services\Tax;

final class TaxNumberFactory
{
    public function __construct(private string $taxNumber)
    {
        if (!$taxNumber) {
            throw new \InvalidArgumentException('The tax number is empty.');
        }
    }
    
    public function getTaxNumber(): TaxNumberInterface
    {
        $countryPrefix = strtoupper(substr($this->taxNumber, 0, 2));
        $number = substr($this->taxNumber, 2);
        
        $taxNumber = match ($countryPrefix) {
            'DE' => new GermanTaxNumber($number),
            'IT' => new ItalianTaxNumber($number),
            'GR' => new GreekTaxNumber($number),
            'FR' => new FrenchTaxNumber($number),
            default => throw new \RuntimeException('The tax number format is incorrect.'),
        };
        
        return $taxNumber;
    }
}