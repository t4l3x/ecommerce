<?php
declare(strict_types=1);

namespace App\Infrastructure\User\Repository;

use App\Domain\IdentityAccess\User\Entities\User as UserEntity;
use App\Domain\IdentityAccess\User\Repository\UserRepositoryInterface;
use App\Domain\IdentityAccess\User\ValueObjects\Email;
use App\Domain\IdentityAccess\User\ValueObjects\Password;
use App\Infrastructure\User\Eloquent\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(Email $email): ?UserEntity
    {
        $user = User::where('email', $email->value())->first();

        if (!$user) {
            return null;
        }

        return new UserEntity(
            new Email($user->email),
            new Password($user->password),
            $user->name,
        );
    }

    public function findById(int $userId): ?UserEntity
    {
        $user = User::where('id', $userId)->first();

        if (!$user) {
            return null;
        }

        return new UserEntity(
            new Email($user->email),
            new Password($user->password),
            $user->name,
        );
    }

    public function save(UserEntity $user): void
    {
        $userModel = new User([
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make($user->password->value()),
        ]);

        $userModel->save();
    }

    public function update(UserEntity $user): void
    {
        $userModel = User::where('email', $user->getEmail()->value())->first();

        if ($userModel) {
            $userModel->name = $user->name;
            $userModel->password = Hash::make($user->password->value());
            $userModel->save();
        }
    }

    public function delete(UserEntity $user): void
    {
        $userModel = User::where('email', $user->email->value())->first();

        $userModel?->delete();
    }

}
