<?php

declare(strict_types = 1);

namespace App\Products\Queries\GetPrice;

final class Command
{
    public function __construct(
        readonly public int $productId,
        readonly public string $taxNumber,
        readonly public string $couponCode,
        readonly public string $paymentProcessor
    ) {
    }
}