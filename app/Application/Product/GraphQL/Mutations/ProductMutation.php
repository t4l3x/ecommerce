<?php
declare(strict_types=1);

namespace App\Application\Product\Graphql\Mutations;

use App\Application\Product\Services\ProductServiceApplication;

class ProductMutation
{
    private ProductServiceApplication $productService;

    public function __construct(ProductServiceApplication $productService)
    {
        $this->productService = $productService;
    }

    public function createProduct($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $name = $args['input']['name'];
        $description = $args['input']['description'] ?? null;
        $price = new Price($args['input']['price']);

        return $this->productService->createProduct($name, $description, $price);
    }

    public function updateProduct($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $id = $args['id'];
        $name = $args['input']['name'];
        $description = $args['input']['description'] ?? null;
        $price = new Price($args['input']['price']);

        return $this->productService->updateProduct($id, $name, $description, $price);
    }

    public function deleteProduct($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $id = $args['id'];

        return $this->productService->deleteProduct($id);
    }
}
