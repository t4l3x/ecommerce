<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\Auth\Services;

interface TokenService
{
    public function createToken(string $email): string;
}
