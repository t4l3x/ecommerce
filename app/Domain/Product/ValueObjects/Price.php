<?php

namespace App\Domain\Product\ValueObjects;

class Price
{

    private int $valueInCents;

    public function __construct(int $valueInCents)
    {
        if ($valueInCents < 0) {
            throw new InvalidArgumentException("Price cannot be negative.");
        }

        $this->valueInCents = $valueInCents;
    }

    public function getValueInCents(): int
    {
        return $this->valueInCents;
    }

    public function getValueInDollars(): float
    {
        return $this->valueInCents / 100;
    }


}
