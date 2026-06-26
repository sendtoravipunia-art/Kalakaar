<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Request;
use App\Core\Session;

/**
 * Restricts a route to a single role. Because the router instantiates
 * middleware with no arguments, concrete guards extend this and set $role.
 */
abstract class RoleMiddleware implements Middleware
{
    protected string $role = '';

    public function handle(Request $request): void
    {
        $user = Session::get('user');

        if ($user === null || ($user['role'] ?? null) !== $this->role) {
            http_response_code(403);
            echo 'Forbidden — this area is for ' . $this->role . 's only.';
            exit;
        }
    }
}
