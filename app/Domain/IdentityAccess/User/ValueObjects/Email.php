<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\User\ValueObjects;

class Email {
    public function __construct(private readonly string $value) {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email address');
        }
    }

    public function value(): string {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
    public function equals(Email $other): bool {
        return $this->value === $other->value;
    }
}
