<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\User;

final class UserRepository extends Repository
{
    protected string $table = 'users';
    protected string $model = User::class;

    public function findByEmail(string $email): ?User
    {
        /** @var User|null $user */
        $user = $this->findBy('email', $email);
        return $user;
    }

    public function emailExists(string $email): bool
    {
        return $this->findByEmail($email) !== null;
    }
}
