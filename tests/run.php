<?php

declare(strict_types=1);

/**
 * Zero-dependency test runner. Discovers every tests/**\/*Test.php, runs it,
 * and prints a summary. Exit code is non-zero if any assertion fails.
 *
 * Run:  php tests/run.php
 */

use App\Core\TestCase;

define('BASE_PATH', dirname(__DIR__));
require BASE_PATH . '/vendor/autoload.php';

$files = glob(BASE_PATH . '/tests/Unit/*Test.php') ?: [];
sort($files);

$totalPassed = 0;
$allFailures = [];

foreach ($files as $file) {
    $class = 'Tests\\Unit\\' . basename($file, '.php');
    if (!class_exists($class)) {
        continue;
    }

    /** @var TestCase $test */
    $test = new $class();
    $test->run();
    $result = $test->results();

    $totalPassed += $result['passed'];
    $allFailures = array_merge($allFailures, $result['failures']);

    $status = $result['failures'] === [] ? 'PASS' : 'FAIL';
    printf("[%s] %s (%d assertions)\n", $status, basename($file), $result['passed']);
}

echo str_repeat('-', 50) . PHP_EOL;
printf("Total: %d passed, %d failed across %d test files.\n", $totalPassed, count($allFailures), count($files));

foreach ($allFailures as $failure) {
    echo "  - {$failure}\n";
}

exit($allFailures === [] ? 0 : 1);
