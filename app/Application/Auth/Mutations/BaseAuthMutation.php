<?php

namespace App\Application\Auth\Mutations;

use App\Domains\Authentication\Services\AuthService;

abstract class BaseAuthMutation
{
    public AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
}
