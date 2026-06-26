<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\LoginRequest;
use App\Services\AuthService;

final class LoginController extends Controller
{
    public function __construct(
        private readonly AuthService $auth = new AuthService(),
    ) {
    }

    public function show(Request $request): string
    {
        return $this->view('auth.login', ['title' => 'Log in to Kalakaar']);
    }

    public function login(Request $request): string
    {
        $data = $request->only(['email', 'password']);
        $validator = LoginRequest::validate($data);

        if ($validator->fails()) {
            $this->withErrors($validator->errors(), ['email' => $data['email']]);
            return $this->redirect('/login');
        }

        $user = $this->auth->attempt((string) $data['email'], (string) $data['password']);

        if ($user === null) {
            $this->withErrors(['email' => ['These credentials do not match our records.']], ['email' => $data['email']]);
            return $this->redirect('/login');
        }

        Session::flash('_success', 'Welcome back, ' . $user->name . '!');
        return $this->redirect('/dashboard');
    }
}
