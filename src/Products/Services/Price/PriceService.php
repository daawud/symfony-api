<?php

declare(strict_types = 1);

namespace App\Products\Services\Price;

use App\Products\Services\Discount\DiscountInterface;
use App\Products\Services\Tax\TaxNumberInterface;

final class PriceService implements PriceServiceInterface
{
    public function calculatePrice(
        float $price,
        TaxNumberInterface $taxNumber,
        DiscountInterface $couponCode
    ): float {
        // TODO: Implement calculatePrice() method.
    }
}