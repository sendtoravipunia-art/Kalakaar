<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Notification;

final class NotificationRepository extends Repository
{
    protected string $table = 'notifications';
    protected string $model = Notification::class;
}
