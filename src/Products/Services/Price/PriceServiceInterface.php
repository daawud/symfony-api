<?php

namespace App\Products\Services\Price;

use App\Products\Services\Discount\DiscountInterface;
use App\Products\Services\Tax\TaxNumberInterface;

interface PriceServiceInterface
{
    public function calculatePrice(
        float $price,
        TaxNumberInterface $taxNumber,
        DiscountInterface $couponCode
    ): float;
}