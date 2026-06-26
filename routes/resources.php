<?php

declare(strict_types=1);

use App\Core\Router;
use App\Middleware\AuthMiddleware;
use App\Controllers\CategoryController;
use App\Controllers\SkillController;
use App\Controllers\ArtistProfileController;
use App\Controllers\ProducerProfileController;
use App\Controllers\PortfolioItemController;
use App\Controllers\HireRequestController;
use App\Controllers\ReviewController;
use App\Controllers\ConversationController;
use App\Controllers\MessageController;
use App\Controllers\NotificationController;
use App\Controllers\BookingController;
use App\Controllers\TagController;
use App\Controllers\ArtistSkillController;
use App\Controllers\SavedArtistController;
use App\Controllers\ReportController;

/** @var Router $router */

$router->get('/categories', [CategoryController::class, 'index']);
$router->get('/categories/create', [CategoryController::class, 'create'], [AuthMiddleware::class]);
$router->post('/categories', [CategoryController::class, 'store'], [AuthMiddleware::class]);
$router->get('/categories/{id}', [CategoryController::class, 'show']);
$router->get('/categories/{id}/edit', [CategoryController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/categories/{id}/update', [CategoryController::class, 'update'], [AuthMiddleware::class]);
$router->post('/categories/{id}/delete', [CategoryController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/skills', [SkillController::class, 'index']);
$router->get('/skills/create', [SkillController::class, 'create'], [AuthMiddleware::class]);
$router->post('/skills', [SkillController::class, 'store'], [AuthMiddleware::class]);
$router->get('/skills/{id}', [SkillController::class, 'show']);
$router->get('/skills/{id}/edit', [SkillController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/skills/{id}/update', [SkillController::class, 'update'], [AuthMiddleware::class]);
$router->post('/skills/{id}/delete', [SkillController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/artist-profiles', [ArtistProfileController::class, 'index']);
$router->get('/artist-profiles/create', [ArtistProfileController::class, 'create'], [AuthMiddleware::class]);
$router->post('/artist-profiles', [ArtistProfileController::class, 'store'], [AuthMiddleware::class]);
$router->get('/artist-profiles/{id}', [ArtistProfileController::class, 'show']);
$router->get('/artist-profiles/{id}/edit', [ArtistProfileController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/artist-profiles/{id}/update', [ArtistProfileController::class, 'update'], [AuthMiddleware::class]);
$router->post('/artist-profiles/{id}/delete', [ArtistProfileController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/producer-profiles', [ProducerProfileController::class, 'index']);
$router->get('/producer-profiles/create', [ProducerProfileController::class, 'create'], [AuthMiddleware::class]);
$router->post('/producer-profiles', [ProducerProfileController::class, 'store'], [AuthMiddleware::class]);
$router->get('/producer-profiles/{id}', [ProducerProfileController::class, 'show']);
$router->get('/producer-profiles/{id}/edit', [ProducerProfileController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/producer-profiles/{id}/update', [ProducerProfileController::class, 'update'], [AuthMiddleware::class]);
$router->post('/producer-profiles/{id}/delete', [ProducerProfileController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/portfolio', [PortfolioItemController::class, 'index']);
$router->get('/portfolio/create', [PortfolioItemController::class, 'create'], [AuthMiddleware::class]);
$router->post('/portfolio', [PortfolioItemController::class, 'store'], [AuthMiddleware::class]);
$router->get('/portfolio/{id}', [PortfolioItemController::class, 'show']);
$router->get('/portfolio/{id}/edit', [PortfolioItemController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/portfolio/{id}/update', [PortfolioItemController::class, 'update'], [AuthMiddleware::class]);
$router->post('/portfolio/{id}/delete', [PortfolioItemController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/hire-requests', [HireRequestController::class, 'index']);
$router->get('/hire-requests/create', [HireRequestController::class, 'create'], [AuthMiddleware::class]);
$router->post('/hire-requests', [HireRequestController::class, 'store'], [AuthMiddleware::class]);
$router->get('/hire-requests/{id}', [HireRequestController::class, 'show']);
$router->get('/hire-requests/{id}/edit', [HireRequestController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/hire-requests/{id}/update', [HireRequestController::class, 'update'], [AuthMiddleware::class]);
$router->post('/hire-requests/{id}/delete', [HireRequestController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/reviews', [ReviewController::class, 'index']);
$router->get('/reviews/create', [ReviewController::class, 'create'], [AuthMiddleware::class]);
$router->post('/reviews', [ReviewController::class, 'store'], [AuthMiddleware::class]);
$router->get('/reviews/{id}', [ReviewController::class, 'show']);
$router->get('/reviews/{id}/edit', [ReviewController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/reviews/{id}/update', [ReviewController::class, 'update'], [AuthMiddleware::class]);
$router->post('/reviews/{id}/delete', [ReviewController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/conversations', [ConversationController::class, 'index']);
$router->get('/conversations/create', [ConversationController::class, 'create'], [AuthMiddleware::class]);
$router->post('/conversations', [ConversationController::class, 'store'], [AuthMiddleware::class]);
$router->get('/conversations/{id}', [ConversationController::class, 'show']);
$router->get('/conversations/{id}/edit', [ConversationController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/conversations/{id}/update', [ConversationController::class, 'update'], [AuthMiddleware::class]);
$router->post('/conversations/{id}/delete', [ConversationController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/messages', [MessageController::class, 'index']);
$router->get('/messages/create', [MessageController::class, 'create'], [AuthMiddleware::class]);
$router->post('/messages', [MessageController::class, 'store'], [AuthMiddleware::class]);
$router->get('/messages/{id}', [MessageController::class, 'show']);
$router->get('/messages/{id}/edit', [MessageController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/messages/{id}/update', [MessageController::class, 'update'], [AuthMiddleware::class]);
$router->post('/messages/{id}/delete', [MessageController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/notifications', [NotificationController::class, 'index']);
$router->get('/notifications/create', [NotificationController::class, 'create'], [AuthMiddleware::class]);
$router->post('/notifications', [NotificationController::class, 'store'], [AuthMiddleware::class]);
$router->get('/notifications/{id}', [NotificationController::class, 'show']);
$router->get('/notifications/{id}/edit', [NotificationController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/notifications/{id}/update', [NotificationController::class, 'update'], [AuthMiddleware::class]);
$router->post('/notifications/{id}/delete', [NotificationController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/bookings', [BookingController::class, 'index']);
$router->get('/bookings/create', [BookingController::class, 'create'], [AuthMiddleware::class]);
$router->post('/bookings', [BookingController::class, 'store'], [AuthMiddleware::class]);
$router->get('/bookings/{id}', [BookingController::class, 'show']);
$router->get('/bookings/{id}/edit', [BookingController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/bookings/{id}/update', [BookingController::class, 'update'], [AuthMiddleware::class]);
$router->post('/bookings/{id}/delete', [BookingController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/tags', [TagController::class, 'index']);
$router->get('/tags/create', [TagController::class, 'create'], [AuthMiddleware::class]);
$router->post('/tags', [TagController::class, 'store'], [AuthMiddleware::class]);
$router->get('/tags/{id}', [TagController::class, 'show']);
$router->get('/tags/{id}/edit', [TagController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/tags/{id}/update', [TagController::class, 'update'], [AuthMiddleware::class]);
$router->post('/tags/{id}/delete', [TagController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/artist-skills', [ArtistSkillController::class, 'index']);
$router->get('/artist-skills/create', [ArtistSkillController::class, 'create'], [AuthMiddleware::class]);
$router->post('/artist-skills', [ArtistSkillController::class, 'store'], [AuthMiddleware::class]);
$router->get('/artist-skills/{id}', [ArtistSkillController::class, 'show']);
$router->get('/artist-skills/{id}/edit', [ArtistSkillController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/artist-skills/{id}/update', [ArtistSkillController::class, 'update'], [AuthMiddleware::class]);
$router->post('/artist-skills/{id}/delete', [ArtistSkillController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/saved-artists', [SavedArtistController::class, 'index']);
$router->get('/saved-artists/create', [SavedArtistController::class, 'create'], [AuthMiddleware::class]);
$router->post('/saved-artists', [SavedArtistController::class, 'store'], [AuthMiddleware::class]);
$router->get('/saved-artists/{id}', [SavedArtistController::class, 'show']);
$router->get('/saved-artists/{id}/edit', [SavedArtistController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/saved-artists/{id}/update', [SavedArtistController::class, 'update'], [AuthMiddleware::class]);
$router->post('/saved-artists/{id}/delete', [SavedArtistController::class, 'destroy'], [AuthMiddleware::class]);

$router->get('/reports', [ReportController::class, 'index']);
$router->get('/reports/create', [ReportController::class, 'create'], [AuthMiddleware::class]);
$router->post('/reports', [ReportController::class, 'store'], [AuthMiddleware::class]);
$router->get('/reports/{id}', [ReportController::class, 'show']);
$router->get('/reports/{id}/edit', [ReportController::class, 'edit'], [AuthMiddleware::class]);
$router->post('/reports/{id}/update', [ReportController::class, 'update'], [AuthMiddleware::class]);
$router->post('/reports/{id}/delete', [ReportController::class, 'destroy'], [AuthMiddleware::class]);

