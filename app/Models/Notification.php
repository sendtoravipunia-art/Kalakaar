<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Notification extends Model
{
    protected string $table = 'notifications';

    protected array $fillable = ['user_id', 'type', 'message'];
}
