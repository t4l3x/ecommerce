<?php
declare(strict_types=1);

namespace App\Application\Auth\Services;

use App\Application\Exceptions\BaseGraphQL;
use App\Domain\IdentityAccess\Auth\Exceptions\EmailAlreadyExistsException;
use App\Domain\IdentityAccess\Auth\Exceptions\InvalidCredentialsException;
use App\Domain\IdentityAccess\Auth\Services\AuthService;
use App\Domain\IdentityAccess\User\Entities\User;
use App\Domain\IdentityAccess\User\ValueObjects\Email;
use App\Domain\IdentityAccess\User\ValueObjects\Password;
use Exception;

class AuthServiceApplication
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @throws Exception
     */
    public function authenticate(string $email, string $password): User
    {
        $emailVO = new Email($email);
        $passwordVO = new Password($password);
        try {
            return $this->authService->checkCredentials($emailVO, $passwordVO);
        }catch (InvalidCredentialsException $e){
            throw  new BaseGraphQL($e->getMessage());
        }

    }

    /**
     * @throws Exception
     */
    public function register(string $email, string $password): User
    {
        $emailVO = new Email($email);
        $passwordVO = new Password($password);
        try {
            return $this->authService->register($emailVO, $passwordVO);
        }catch (EmailAlreadyExistsException $e){
            throw  new BaseGraphQL($e->getMessage());
        }

    }
}
