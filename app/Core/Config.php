<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Dot-notation config loader. config('database.host') reads config/database.php.
 */
final class Config
{
    /** @var array<string, mixed> */
    private static array $cache = [];

    public static function get(string $key, mixed $default = null): mixed
    {
        [$file, $rest] = array_pad(explode('.', $key, 2), 2, null);

        if (!isset(self::$cache[$file])) {
            $path = BASE_PATH . "/config/{$file}.php";
            self::$cache[$file] = is_file($path) ? require $path : [];
        }

        $value = self::$cache[$file];

        if ($rest !== null) {
            foreach (explode('.', $rest) as $segment) {
                if (!is_array($value) || !array_key_exists($segment, $value)) {
                    return $default;
                }
                $value = $value[$segment];
            }
        }

        return $value;
    }
}
