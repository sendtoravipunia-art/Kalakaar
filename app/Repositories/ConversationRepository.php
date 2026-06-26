<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Conversation;

final class ConversationRepository extends Repository
{
    protected string $table = 'conversations';
    protected string $model = Conversation::class;
}
