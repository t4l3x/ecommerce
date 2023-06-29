<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\Auth\Exceptions;

use Exception;

class EmailAlreadyExistsException extends Exception
{
    public function __construct()
    {
        parent::__construct("Email already taken", 401);
    }
}
