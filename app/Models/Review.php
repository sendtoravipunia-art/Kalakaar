<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Review extends Model
{
    protected string $table = 'reviews';

    protected array $fillable = ['artist_id', 'producer_id', 'rating', 'comment'];
}
