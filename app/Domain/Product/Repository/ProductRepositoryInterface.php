<?php
declare(strict_types=1);

namespace App\Domain\Product\Repository;

use App\Domain\Product\Entities\Product;

interface ProductRepositoryInterface
{
    public function findById(int $id): ?Product;

    public function findAll(): array;

    public function save(Product $product): ?Product;

    public function delete(Product $product): void;
}

