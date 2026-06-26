<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Conversation extends Model
{
    protected string $table = 'conversations';

    protected array $fillable = ['producer_id', 'artist_id', 'subject'];
}
