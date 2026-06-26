<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Message;

final class MessageRepository extends Repository
{
    protected string $table = 'messages';
    protected string $model = Message::class;
}
