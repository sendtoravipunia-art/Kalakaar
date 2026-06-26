<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Tiny regex router. Supports {param} placeholders and per-route middleware.
 */
final class Router
{
    /** @var array<int, array{method:string, path:string, handler:array, mw:array}> */
    private array $routes = [];

    public function get(string $path, array $handler, array $middleware = []): void
    {
        $this->add('GET', $path, $handler, $middleware);
    }

    public function post(string $path, array $handler, array $middleware = []): void
    {
        $this->add('POST', $path, $handler, $middleware);
    }

    private function add(string $method, string $path, array $handler, array $middleware): void
    {
        $this->routes[] = [
            'method'  => $method,
            'path'    => $this->normalise($path),
            'handler' => $handler,
            'mw'      => $middleware,
        ];
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = $this->normalise(parse_url($uri, PHP_URL_PATH) ?: '/');
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            $pattern = '#^' . preg_replace('#\{([a-zA-Z_]+)\}#', '(?P<$1>[^/]+)', $route['path']) . '$#';

            if ($route['method'] === $method && preg_match($pattern, $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                foreach ($route['mw'] as $middlewareClass) {
                    (new $middlewareClass())->handle(new Request());
                }

                [$class, $action] = $route['handler'];
                $controller = new $class();
                echo $controller->{$action}(new Request(), ...array_values($params));
                return;
            }
        }

        http_response_code(404);
        echo View::render('errors.404', ['title' => 'Not Found']);
    }

    private function normalise(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
