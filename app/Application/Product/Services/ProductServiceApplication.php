<?php
declare(strict_types=1);

namespace App\Application\Product\Services;

use App\Domain\Product\Entities\Product;
use App\Domain\Product\Services\ProductService;

class ProductServiceApplication
{
    public function __construct(public ProductService $productService)
    {
    }

    public function getProduct(int $id): ?Product
    {
        return $this->productService->getProduct($id);
    }

    public function createProduct(mixed $name, mixed $description, \App\Application\Product\Graphql\Mutations\Price $price)
    {
    }
}
