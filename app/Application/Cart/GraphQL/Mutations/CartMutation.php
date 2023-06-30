<?php
declare(strict_types=1);

namespace App\Application\Cart\GraphQL\Mutations;

use App\Application\Cart\Services\CartServiceApplication;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CartMutation
{
    private CartServiceApplication $cartService;

    public function __construct(CartServiceApplication $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $productId = $args['input']['productId'];
        $quantity = $args['input']['quantity'];

        // Get or create the cart ID
        $cartId = $this->getOrCreateCartId($context);

        $this->cartService->addProductToCart($cartId, $productId, $quantity);

        return $this->cartService->getCart($cartId);
    }

    public function removeFromCart($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $productId = $args['input']['productId'];

        // Get or create the cart ID
        $cartId = $this->getOrCreateCartId($context);

        $this->cartService->removeProductFromCart($cartId, $productId);

        return $this->cartService->getCart($cartId);
    }

    public function updateQuantityInCart($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $productId = $args['input']['productId'];
        $quantity = $args['input']['quantity'];

        // Get or create the cart ID
        $cartId = $this->getOrCreateCartId($context);

        $this->cartService->updateProductQuantityInCart($cartId, $productId, $quantity);

        return $this->cartService->getCart($cartId);
    }

    private function getOrCreateCartId(GraphQLContext $context): string
    {
        // Get the cart ID from the session, or create a new one if it does not exist
        // The actual implementation depends on your session management logic
        // For example, it could look something like this:
        if (!$context->session()->has('cartId')) {
            $context->session()->put('cartId', $this->cartService->createCart()->getId());
        }

        return $context->session()->get('cartId');
    }
}
