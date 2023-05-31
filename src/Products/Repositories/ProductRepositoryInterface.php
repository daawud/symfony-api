<?php

namespace App\Products\Repositories;

use App\Products\Entities\Product;

interface ProductRepositoryInterface
{
    public function getProductById(int $productId): Product;
}