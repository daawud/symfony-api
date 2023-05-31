<?php

declare(strict_types = 1);

namespace App\Products\Services\Tax;

final class FrenchTaxNumber implements TaxNumberInterface
{
    public function __construct(private string $number)
    {
        $prefix = substr($number, 0, 2);
        $number = substr($number, 2);
        
        if (!ctype_alpha($prefix) || !ctype_digit($number) || strlen($number) !== 9) {
            throw new \InvalidArgumentException('The tax number format is incorrect.');
        }
    }
    
    public function taxSum(float $sum): float
    {
        return $sum * $this->taxRateAsDecimal();
    }
    
    private function taxRateAsDecimal(): float
    {
        return 0.2;
    }
}