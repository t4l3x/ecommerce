<?php
declare(strict_types=1);

namespace App\Infrastructure\Cart\Repository;

use App\Domain\Cart\Entity\Cart;
use App\Domain\Cart\Repository\ICartRepository;
use App\Domain\Product\Entities\Product;
use App\Infrastructure\Cart\Eloquent\Cart as CartModel;

class CartRepository implements ICartRepository
{
    public function findById(int $id): ?Cart
    {
        $cartModel = CartModel::find($id);

        return $cartModel ? $this->mapToEntity($cartModel) : null;
    }

    public function findByUserId(int $userId): ?Cart
    {
        $cartModel = CartModel::where('user_id', $userId)->first();

        return $cartModel ? $this->mapToEntity($cartModel) : null;
    }

    public function findBySessionId(string $sessionId): ?Cart
    {
        $cartModel = CartModel::where('session_id', $sessionId)->first();

        return $cartModel ? $this->mapToEntity($cartModel) : null;
    }

    public function create(Cart $cart): ?Cart
    {
        $cartModel = new CartModel();

        $cartModel->user_id = $cart->getUserId();
        $cartModel->session_id = $cart->getSessionId();

        $cartModel->save();

        return $this->mapToEntity($cartModel);
    }

    public function delete(Cart $cart): ?Cart
    {
        $cartModel = CartModel::find($cart->getId());

        if($cartModel){
            $cartModel->delete();
            return $cart;
        }

        return null;
    }

    public function save(Cart $cart): void
    {
        $cartModel = CartModel::find($cart->getId());

        if($cartModel){
            $cartModel->user_id = $cart->getUserId();
            $cartModel->session_id = $cart->getSessionId();

            $cartModel->save();
        }
    }

    protected function mapToEntity(CartModel $cartModel): Cart
    {
        $cart = new Cart($cartModel->user_id, $cartModel->session_id);
        $cart->setId($cartModel->id);

        return $cart;
    }
}
