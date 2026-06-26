<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Session;
use App\Models\User;
use App\Repositories\UserRepository;

/**
 * Registration, login and logout. Passwords are hashed with bcrypt.
 */
final class AuthService
{
    public function __construct(
        private readonly UserRepository $users = new UserRepository(),
    ) {
    }

    /**
     * @param array{name:string,email:string,password:string,role:string} $data
     */
    public function register(array $data): User
    {
        $id = $this->users->create([
            'name'     => $data['name'],
            'email'    => strtolower(trim($data['email'])),
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'role'     => $data['role'],
        ]);

        /** @var User $user */
        $user = $this->users->find($id);
        $this->login($user);

        return $user;
    }

    public function attempt(string $email, string $password): ?User
    {
        $user = $this->users->findByEmail(strtolower(trim($email)));

        if ($user === null || !password_verify($password, (string) $user->password)) {
            return null;
        }

        $this->login($user);
        return $user;
    }

    public function login(User $user): void
    {
        session_regenerate_id(true);
        Session::set('user', [
            'id'    => (int) $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role,
        ]);
    }

    public function logout(): void
    {
        Session::forget('user');
        session_regenerate_id(true);
    }

    public function emailTaken(string $email): bool
    {
        return $this->users->emailExists(strtolower(trim($email)));
    }
}
