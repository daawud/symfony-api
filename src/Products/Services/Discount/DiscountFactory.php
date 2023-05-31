<?php

declare(strict_types = 1);

namespace App\Products\Services\Discount;

final class DiscountFactory
{
    public function __construct(private string $couponCode)
    {
        if (!$couponCode) {
            throw new \InvalidArgumentException('The coupon code is empty.');
        }
    }
    
    public function getDiscount(): DiscountInterface
    {
        $prefix = strtoupper($this->couponCode[0]);
        $number = substr($this->couponCode, 1);
        
        $discount = match ($prefix) {
            'D' => new FixedDiscount($number),
            'P' => new PercentageDiscount($number),
            default => throw new \RuntimeException('The coupon code format is incorrect.'),
        };
        
        return $discount;
    }
}