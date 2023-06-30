<?php
declare(strict_types=1);

namespace App\Domain\Cart\Repository;

use App\Domain\Cart\Entity\Cart;
use App\Domain\IdentityAccess\User\Entities\User;
use App\Domain\Product\Entities\Product;

interface ICartRepository
{
    public function findById(int $id): ?Cart;

    public function findByUserId(int $userId): ?Cart;

    public function findBySessionId(string $sessionId): ?Cart;

    public function save(Cart $cart): void;
}
