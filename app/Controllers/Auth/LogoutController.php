<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Services\AuthService;

final class LogoutController extends Controller
{
    public function __construct(
        private readonly AuthService $auth = new AuthService(),
    ) {
    }

    public function logout(Request $request): string
    {
        $this->auth->logout();
        return $this->redirect('/');
    }
}
