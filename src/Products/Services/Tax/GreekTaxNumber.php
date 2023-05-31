<?php

declare(strict_types = 1);

namespace App\Products\Services\Tax;

final class GreekTaxNumber implements TaxNumberInterface
{
    public function __construct(private string $number)
    {
        if (!ctype_digit($number) || strlen($number) !== 9) {
            throw new \InvalidArgumentException('The tax number format is incorrect.');
        }
    }
    
    public function taxSum(float $sum): float
    {
        return $sum * $this->taxRateAsDecimal();
    }
    
    private function taxRateAsDecimal(): float
    {
        return 0.24;
    }
}