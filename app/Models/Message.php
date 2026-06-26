<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Message extends Model
{
    protected string $table = 'messages';

    protected array $fillable = ['conversation_id', 'sender_id', 'body'];
}
