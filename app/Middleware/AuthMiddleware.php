<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Request;
use App\Core\Session;

/**
 * Blocks guests from protected routes.
 */
final class AuthMiddleware implements Middleware
{
    public function handle(Request $request): void
    {
        if (!Session::has('user')) {
            Session::flash('_errors', ['auth' => ['Please log in to continue.']]);
            header('Location: /login');
            exit;
        }
    }
}
