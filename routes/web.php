<?php

declare(strict_types=1);

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\ArtistController;
use App\Controllers\SearchController;
use App\Controllers\HireController;
use App\Controllers\DashboardController;
use App\Controllers\ProfileController;
use App\Middleware\AuthMiddleware;

/** @var Router $router */

// Public pages
$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);

// Auth
$router->get('/login', [LoginController::class, 'show']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/register', [RegisterController::class, 'show']);
$router->post('/register', [RegisterController::class, 'register']);
$router->post('/logout', [LogoutController::class, 'logout']);

// Artists (public browse + profile)
$router->get('/artists', [ArtistController::class, 'index']);
$router->get('/artists/{id}', [ArtistController::class, 'show']);

// Search (producers find talent)
$router->get('/search', [SearchController::class, 'index']);

// Hiring (auth required)
$router->post('/artists/{id}/hire', [HireController::class, 'store'], [AuthMiddleware::class]);

// Dashboard (auth required)
$router->get('/dashboard', [DashboardController::class, 'index'], [AuthMiddleware::class]);

// My Profile (auth required)
$router->get('/profile/edit', [ProfileController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/profile', [ProfileController::class, 'update'], [AuthMiddleware::class]);

// Resourceful CRUD routes for every scaffolded entity.
if (is_file(BASE_PATH . '/routes/resources.php')) {
    require BASE_PATH . '/routes/resources.php';
}
