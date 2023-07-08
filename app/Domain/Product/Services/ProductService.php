<?php
declare(strict_types=1);

namespace App\Domain\Product\Services;

use App\Domain\Product\Entities\Product;
use App\Domain\Product\Repository\IProductRepository;
use App\Domain\Product\ValueObjects\Price;

class ProductService
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function addProduct(string $name, Price $price, string $description): Product
    {
        $product = new Product($name, $description, $price);
        $this->productRepository->save($product);

        return $product;
    }

    public function getProduct(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    public function getProducts(): array
    {
        return $this->productRepository->findAll();
    }
    public function deleteProduct(int $id): void
    {
        $product = $this->getProduct($id);

        if (!$product) {
            throw new ProductNotFoundException();
        }

        $this->productRepository->delete($product);
    }
}
