<?php

namespace App\Products\Services\Tax;

interface TaxNumberInterface
{
    public function taxSum(float $sum): float;
}