<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Core\Database;
use App\Core\Seeder;

/**
 * Creates demo login accounts so a fresh install has something to sign in with
 * and so seeded artist profiles resolve a real user name. Idempotent: skips
 * any email that already exists. Demo password for every account is "password".
 */
final class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Aarav Singh',       'email' => 'artist@kalakaar.test',   'role' => 'artist'],
            ['name' => 'Maya Productions',  'email' => 'producer@kalakaar.test', 'role' => 'producer'],
            ['name' => 'Riya Sharma',       'email' => 'riya@kalakaar.test',     'role' => 'artist'],
        ];

        foreach ($users as $user) {
            $exists = Database::selectOne('SELECT id FROM users WHERE email = ?', [$user['email']]);
            if ($exists !== null) {
                continue;
            }

            $this->insert('users', [
                'name'     => $user['name'],
                'email'    => $user['email'],
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role'     => $user['role'],
            ]);
        }
    }
}
