<?php
declare(strict_types=1);

namespace App\Domain\Cart\Repository;

use App\Domain\Cart\Entity\Cart;
use App\Domain\Cart\Entity\CartItem;

interface ICartItemRepository
{
    public function add(Cart $cart, CartItem $cartItem): void;

    public function remove(Cart $cart, string $productId): void;

    public function updateQuantity(Cart $cart, string $productId, int $quantity): void;

    public function getByCartIdAndProductId(string $cartId, string $productId): ?CartItem;

    public function getAllByCartId(string $cartId): array;
}
