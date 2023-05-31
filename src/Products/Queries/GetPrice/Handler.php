<?php

declare(strict_types = 1);

namespace App\Products\Queries\GetPrice;

use App\Products\Exceptions\ProductNotFoundException;
use App\Products\Repositories\ProductRepositoryInterface;
use App\Products\Services\Discount\DiscountFactory;
use App\Products\Services\Price\PriceServiceInterface;
use App\Products\Services\Tax\TaxNumberFactory;

final class Handler
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private PriceServiceInterface $priceService
    ) {
    }
    
    public function handle(Command $command): float
    {
        if (!$product = $this->productRepository->getProductById($command->productId)) {
            throw new ProductNotFoundException("Product with id = $command->productId not found.");
        }
        
        $taxNumber = (new TaxNumberFactory($command->taxNumber))->getTaxNumber();
        $discount = (new DiscountFactory($command->couponCode))->getDiscount();
        
        return $this->priceService->calculatePrice($product->price, $taxNumber, $discount);
    }
}