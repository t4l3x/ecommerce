<?php
declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

class Password
{
    public function __construct(
        public string $password,
    )
    {
    }

    public function hashedValue(): string {
        return $this->password;
    }

    public function equals(Password $other): bool {
        return $this->password === $other->password;
    }
}
