<?php
declare(strict_types=1);

namespace App\Application\Auth\Services;

use App\Domain\IdentityAccess\Auth\Services\TokenService;
use App\Infrastructure\User\Eloquent\User;

class LaravelTokenService implements TokenService
{
    private string $tokenName;

    public function __construct(string $tokenName = 'authToken')
    {
        $this->tokenName = $tokenName;
    }

    /**
     * @throws \Exception
     */
    public function createToken(string $email): string
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            return $user->createToken('my-app')->plainTextToken;
        }
        throw new \Exception("User not found");

    }
}
