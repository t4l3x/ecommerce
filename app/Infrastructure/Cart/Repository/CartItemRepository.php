<?php
declare(strict_types=1);

namespace App\Infrastructure\Cart\Repository;

use App\Domain\Cart\Entity\Cart;
use App\Domain\Cart\Entity\CartItem;
use App\Domain\Cart\Repository\ICartItemRepository;

use App\Infrastructure\Cart\Eloquent\Cart as CartModel;
use App\Infrastructure\Cart\Eloquent\CartItem as CartItemModel;

class CartItemRepository implements ICartItemRepository
{
    public function add(Cart $cart, CartItem $cartItem): void
    {
        $cartItemModel = new CartItemModel();

        // This assumes that your CartItem domain entity has getters for these properties.
        $cartItemModel->cart_id = $cart->getId();
        $cartItemModel->product_id = $cartItem->getProductId();
        $cartItemModel->quantity = $cartItem->getQuantity();

        $cartItemModel->save();
    }

    public function remove(Cart $cart, string $productId): void
    {
        CartItemModel::where('cart_id', $cart->getId())->where('product_id', $productId)->delete();
    }

    public function updateQuantity(Cart $cart, string $productId, int $quantity): void
    {
        $cartItemModel = CartItemModel::where('cart_id', $cart->getId())->where('product_id', $productId)->first();

        if ($cartItemModel) {
            $cartItemModel->quantity = $quantity;
            $cartItemModel->save();
        }
    }

    public function getByCartIdAndProductId(string $cartId, string $productId): ?CartItem
    {
        $cartItemModel = CartItemModel::where('cart_id', $cartId)->where('product_id', $productId)->first();

        if (!$cartItemModel) {
            return null;
        }

        // Convert the Eloquent model to the CartItem domain entity.
        return new CartItem($cartItemModel->cart_id, $cartItemModel->product_id, $cartItemModel->quantity);
    }

    public function getAllByCartId(string $cartId): array
    {
        $cartItemModels = CartItemModel::where('cart_id', $cartId)->get();

        return $cartItemModels->map(function ($cartItemModel) {
            // Convert the Eloquent models to the CartItem domain entities.
            return new CartItem($cartItemModel->cart_id, $cartItemModel->product_id, $cartItemModel->quantity);
        })->all();
    }
}
