<?php
declare(strict_types=1);

namespace App\Domain\IdentityAccess\User\Repository;

use App\Domain\IdentityAccess\User\Entities\User;
use App\Domain\IdentityAccess\User\ValueObjects\Email;

interface UserRepositoryInterface
{
    public function findByEmail(Email $email): ?User;

    public function findById(int $userId): ?User;
    public function save(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;


}
