<?php
declare(strict_types=1);

namespace App\Domain\Cart\Services;

use App\Domain\Cart\Entity\Cart;
use App\Domain\Cart\Entity\CartItem;
use App\Domain\Cart\Repository\ICartItemRepository;
use App\Domain\Cart\Repository\ICartRepository;

class CartService
{
    private ICartRepository $cartRepository;
    private ICartItemRepository $cartItemRepository;

    public function __construct(
        ICartRepository $cartRepository,
        ICartItemRepository $cartItemRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    public function createCart(?int $userId, ?string $sessionId): Cart
    {
        $cart = new Cart($userId, $sessionId);
        $this->cartRepository->save($cart);
        return $cart;
    }

    public function addProductToCart(Cart $cart, string $productId, int $quantity): void
    {
        $cartItem = new CartItem($cart->getId(), $productId, $quantity);
        $this->cartItemRepository->add($cart, $cartItem);
    }

    public function removeProductFromCart(Cart $cart, string $productId): void
    {
        $this->cartItemRepository->remove($cart, $productId);
    }

    public function updateProductQuantityInCart(Cart $cart, string $productId, int $quantity): void
    {
        $this->cartItemRepository->updateQuantity($cart, $productId, $quantity);
    }

    public function getCart(string $cartId): Cart
    {
        return $this->cartRepository->get($cartId);
    }


    // ... Other methods for handling cart ...
    public function getCartByUserIdOrSessionId(?int $userId, ?string $sessionId)
    {
    }
}
