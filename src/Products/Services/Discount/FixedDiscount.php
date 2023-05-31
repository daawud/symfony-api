<?php

declare(strict_types = 1);

namespace App\Products\Services\Discount;

final class FixedDiscount implements DiscountInterface
{
    public function __construct(private string $discountSum)
    {
        if (!ctype_digit($discountSum)) {
            throw new \InvalidArgumentException('The coupon code format is incorrect.');
        }
    }
    
    public function sumWithDiscount(float $sum): float
    {
        $sumWithDiscount = $sum - $this->getDiscountSum();
        
        if ($sumWithDiscount <= 0) {
            throw new \DomainException('The total amount cannot be less than or equal to zero.');
        }
        
        return $sumWithDiscount;
    }
    
    private function getDiscountSum(): float
    {
        return (float)$this->discountSum;
    }
}