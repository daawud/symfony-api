<?php

namespace App\Products\Services\Discount;

interface DiscountInterface
{
    public function sumWithDiscount(float $sum): float;
}