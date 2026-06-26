<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Plain-PHP template renderer with a single optional layout wrapper.
 * A page view receives $data; the layout receives the same $data plus $content.
 */
final class View
{
    public static function render(string $name, array $data = [], ?string $layout = 'layouts.app'): string
    {
        $content = self::renderRaw($name, $data);

        if ($layout !== null) {
            return self::renderRaw($layout, array_merge($data, ['content' => $content]));
        }

        return $content;
    }

    public static function renderRaw(string $name, array $data = []): string
    {
        $file = BASE_PATH . '/resources/views/' . str_replace('.', '/', $name) . '.php';

        if (!is_file($file)) {
            return "<!-- view not found: {$name} -->";
        }

        extract($data, EXTR_SKIP);
        ob_start();
        include $file;
        return (string) ob_get_clean();
    }

    public static function partial(string $name, array $data = []): string
    {
        return self::renderRaw($name, $data);
    }
}
