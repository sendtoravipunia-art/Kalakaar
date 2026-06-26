<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Tag extends Model
{
    protected string $table = 'tags';

    protected array $fillable = ['name'];
}
