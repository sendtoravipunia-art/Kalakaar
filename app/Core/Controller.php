<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base controller with view/redirect/json conveniences.
 */
abstract class Controller
{
    protected function view(string $name, array $data = []): string
    {
        return View::render($name, $data);
    }

    protected function redirect(string $to): string
    {
        header('Location: ' . $to);
        return '';
    }

    protected function back(): string
    {
        return $this->redirect($_SERVER['HTTP_REFERER'] ?? '/');
    }

    protected function json(mixed $data, int $status = 200): string
    {
        http_response_code($status);
        header('Content-Type: application/json');
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?: '{}';
    }

    protected function withErrors(array $errors, array $old = []): void
    {
        Session::flash('_errors', $errors);
        Session::flash('_old', $old);
    }

    protected function abort(int $code, string $message = ''): string
    {
        http_response_code($code);
        return View::render("errors.{$code}", ['title' => $message ?: (string) $code]);
    }
}
