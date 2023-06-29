<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\User\Entities;
use App\Domain\IdentityAccess\User\ValueObjects\Email;
use App\Domain\IdentityAccess\User\ValueObjects\Password;

class User
{
    public function __construct(
        public Email $email,
        public Password $password,
        public string $name = '',
    )
    {
    }
}
