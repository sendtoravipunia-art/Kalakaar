<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Request;
use App\Core\Session;

/**
 * Redirects already-authenticated users away from guest-only pages.
 */
final class GuestMiddleware implements Middleware
{
    public function handle(Request $request): void
    {
        if (Session::has('user')) {
            header('Location: /dashboard');
            exit;
        }
    }
}
