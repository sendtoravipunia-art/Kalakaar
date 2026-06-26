<?php

declare(strict_types=1);

use App\Core\Env;
use App\Core\Router;
use App\Core\Session;

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

Env::load(BASE_PATH . '/.env');

date_default_timezone_set((string) config('app.timezone'));

if (config('app.debug')) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

Session::start();

$router = new Router();
require BASE_PATH . '/routes/web.php';

$router->dispatch($_SERVER['REQUEST_URI'] ?? '/', $_SERVER['REQUEST_METHOD'] ?? 'GET');
