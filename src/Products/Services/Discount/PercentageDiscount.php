<?php

declare(strict_types = 1);

namespace App\Products\Services\Discount;

final class PercentageDiscount implements DiscountInterface
{
    public function __construct(private string $discountPercentage)
    {
        if (!ctype_digit($discountPercentage) || strlen($discountPercentage) > 2) {
            throw new \InvalidArgumentException('The coupon code format is incorrect.');
        }
    }
    
    public function sumWithDiscount(float $sum): float
    {
        $sumWithDiscount = $sum - ($sum * $this->getDiscountPercentage() / 100);
        
        if ($sumWithDiscount <= 0) {
            throw new \DomainException('The total amount cannot be less than or equal to zero.');
        }
        
        return $sumWithDiscount;
    }
    
    private function getDiscountPercentage(): float
    {
        return (float)$this->discountPercentage;
    }
}