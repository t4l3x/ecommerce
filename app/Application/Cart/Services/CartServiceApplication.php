<?php
declare(strict_types=1);

namespace App\Application\Cart\Services;

use App\Domain\Cart\Services\CartService;

class CartServiceApplication
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function getOrCreateCart(?int $userId, ?string $sessionId): Cart
    {
        try {
            $cart = $this->cartService->getCartByUserIdOrSessionId($userId, $sessionId);
        } catch (CartNotFoundException $exception) {
            $cart = $this->cartService->createCart($userId, $sessionId);
        }

        return $cart;
    }

    public function addProductToCart(string $sessionId, string $productId, int $quantity): Cart
    {
        $cart = $this->getOrCreateCart(null, $sessionId);
        $this->cartService->addProductToCart($cart, $productId, $quantity);

        return $cart;
    }

    public function removeProductFromCart(string $sessionId, string $productId): Cart
    {
        $cart = $this->getOrCreateCart(null, $sessionId);
        $this->cartService->removeProductFromCart($cart, $productId);

        return $cart;
    }

    public function updateProductQuantityInCart(string $sessionId, string $productId, int $quantity): Cart
    {
        $cart = $this->getOrCreateCart(null, $sessionId);
        $this->cartService->updateProductQuantityInCart($cart, $productId, $quantity);

        return $cart;
    }
}
