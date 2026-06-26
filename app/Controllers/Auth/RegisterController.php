<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Session;
use App\Requests\RegisterRequest;
use App\Services\AuthService;

final class RegisterController extends Controller
{
    public function __construct(
        private readonly AuthService $auth = new AuthService(),
    ) {
    }

    public function show(Request $request): string
    {
        return $this->view('auth.register', ['title' => 'Join Kalakaar']);
    }

    public function register(Request $request): string
    {
        $data = $request->only(['name', 'email', 'password', 'password_confirmation', 'role']);
        $validator = RegisterRequest::validate($data);

        if ($validator->fails()) {
            $this->withErrors($validator->errors(), $data);
            return $this->redirect('/register');
        }

        if ($this->auth->emailTaken($data['email'])) {
            $this->withErrors(['email' => ['That email is already registered.']], $data);
            return $this->redirect('/register');
        }

        $this->auth->register($data);
        Session::flash('_success', 'Welcome to Kalakaar! Your profile is ready.');

        return $this->redirect('/dashboard');
    }
}
