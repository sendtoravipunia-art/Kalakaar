<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Request;
use App\Core\Session;

/**
 * Verifies the per-session CSRF token on state-changing requests.
 * Attach to POST routes that mutate data.
 */
final class CsrfMiddleware implements Middleware
{
    public function handle(Request $request): void
    {
        if (!$request->isPost()) {
            return;
        }

        $submitted = (string) $request->input('_csrf', '');
        $expected = (string) Session::get('_csrf', '');

        if ($expected === '' || !hash_equals($expected, $submitted)) {
            http_response_code(419);
            echo 'CSRF token mismatch. Please refresh and try again.';
            exit;
        }
    }
}
