<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Models\User;

/**
 * Allows only authenticated producers.
 */
final class ProducerOnlyMiddleware extends RoleMiddleware
{
    protected string $role = User::ROLE_PRODUCER;
}
