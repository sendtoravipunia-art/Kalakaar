<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class HireRequest extends Model
{
    protected string $table = 'hire_requests';

    protected array $fillable = ['producer_id', 'artist_id', 'title', 'message', 'budget', 'status'];
}
