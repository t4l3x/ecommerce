<?php
declare(strict_types=1);

namespace App\Application\Product\Graphql\Queries;

use App\Application\Product\Services\ProductServiceApplication;
use App\Domain\Product\Entities\Product;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ProductQuery
{
    private ProductServiceApplication $productService;

    public function __construct(ProductServiceApplication $productService)
    {
        $this->productService = $productService;
    }

    public function products($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): array
    {
        return $this->productService->getProducts();
    }

    public function product($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): ?Product
    {
        $productId = $args['id'];
        return $this->productService->getProduct($productId);
    }
}
