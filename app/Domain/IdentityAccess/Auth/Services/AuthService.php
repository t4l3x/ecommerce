<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\Auth\Services;

use App\Domain\IdentityAccess\Auth\Exceptions\EmailAlreadyExistsException;
use App\Domain\IdentityAccess\Auth\Exceptions\InvalidCredentialsException;
use App\Domain\IdentityAccess\User\Entities\User;
use App\Domain\IdentityAccess\User\Repository\UserRepositoryInterface;
use App\Domain\IdentityAccess\User\ValueObjects\Email;
use App\Domain\IdentityAccess\User\ValueObjects\Password;

class AuthService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function checkCredentials(Email $email, Password $password): User
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user || !password_verify($password->value(), $user->password->value())) {
            throw new InvalidCredentialsException();
        }

        return $user;
    }

    /**
     * @throws EmailAlreadyExistsException
     */
    public function register(Email $email, Password $password): User
    {
        $user = $this->userRepository->findByEmail($email);
        if ($user) {
            throw new EmailAlreadyExistsException();
        }

        $user = new User($email, $password);
        $this->userRepository->save($user);

        return $user;
    }
}
