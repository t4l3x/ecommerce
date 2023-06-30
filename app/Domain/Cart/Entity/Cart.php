<?php
declare(strict_types=1);

namespace App\Domain\Cart\Entity;

use App\Domain\Cart\Entity\CartItem;

class Cart
{
    private int $id;

    public function __construct(public ?int $userId, public ?string $sessionId)
    {

    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
