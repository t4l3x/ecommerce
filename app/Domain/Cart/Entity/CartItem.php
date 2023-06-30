<?php
declare(strict_types=1);

namespace App\Domain\Cart\Entity;

class CartItem
{
    public function __construct(public int $cartId, public int $productId, public int $quantity)
    {

    }

    // Other methods as needed...

    public function incrementQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
    }

    public function decrementQuantity(int $quantity): void
    {
        $this->quantity = max(0, $this->quantity - $quantity);
    }
}
