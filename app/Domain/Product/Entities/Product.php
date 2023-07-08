<?php
declare(strict_types=1);

namespace App\Domain\Product\Entities;

use App\Domain\Product\ValueObjects\Price;

class Product
{
    private int $id;


    public function __construct(
        public string $name,
        public string $description,
        public Price $price,

    ) {
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
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

}
