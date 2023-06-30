<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\Auth\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    public function __construct()
    {
        parent::__construct("Invalid credentials provided", 401);
    }
}
