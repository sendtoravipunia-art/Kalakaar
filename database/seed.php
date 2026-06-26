<?php

declare(strict_types=1);

/**
 * Seeder runner: includes every database/seeders/*Seeder.php and runs them
 * in filename order. Invoked by scripts/seed.sh.
 */

use App\Core\Env;
use App\Core\Seeder;

define('BASE_PATH', dirname(__DIR__));
require BASE_PATH . '/vendor/autoload.php';
Env::load(BASE_PATH . '/.env');

$files = glob(BASE_PATH . '/database/seeders/*Seeder.php') ?: [];
sort($files);

// Users must be seeded before profiles/etc. reference them.
usort($files, static fn ($a, $b) =>
    (str_contains($a, 'UserSeeder') ? 0 : 1) <=> (str_contains($b, 'UserSeeder') ? 0 : 1));

$ran = 0;
foreach ($files as $file) {
    $class = 'Database\\Seeders\\' . basename($file, '.php');
    if (!class_exists($class)) {
        require $file;
    }
    if (class_exists($class)) {
        /** @var Seeder $seeder */
        $seeder = new $class();
        $seeder->run();
        echo "  seeded: " . basename($file) . PHP_EOL;
        $ran++;
    }
}

echo "Done. {$ran} seeder(s) executed." . PHP_EOL;
