<?php

namespace App\Application\Auth\GraphQL\Mutations;

use App\Application\Auth\Services\AuthServiceApplication;
use App\Application\Auth\Services\LaravelTokenService;

abstract class BaseAuthMutation
{
    public AuthServiceApplication $authService;

    public LaravelTokenService $laravelTokenService;

    public function __construct(AuthServiceApplication $authService, LaravelTokenService $laravelTokenService)
    {
        $this->authService = $authService;
        $this->laravelTokenService = $laravelTokenService;
    }
}
