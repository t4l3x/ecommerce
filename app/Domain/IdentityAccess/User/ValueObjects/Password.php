<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\User\ValueObjects;

class Password
{
    public function __construct(
        public string $password,
    )
    {
    }

    public function value(): string {
        return $this->password;
    }

    public function equals(Password $other): bool {
        return $this->password === $other->password;
    }


}
