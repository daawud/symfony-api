<?php

namespace App\Products\Tests\Unit\Products\Services;

use App\Products\Services\Discount\FixedDiscount;
use App\Products\Services\Price\PriceService;
use App\Products\Services\Tax\GermanTaxNumber;
use PHPUnit\Framework\TestCase;

class PriceServiceTest extends TestCase
{
    public function testSuccess(): void
    {
        $taxNumber = new GermanTaxNumber('123456789');
        $discount = new FixedDiscount('250');
        
        $priceService = new PriceService();
        
        $this->assertEquals(892.5, $priceService->calculatePrice(1000, $taxNumber, $discount));
    }
}
