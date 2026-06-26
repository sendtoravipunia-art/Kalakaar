<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Review;

final class ReviewRepository extends Repository
{
    protected string $table = 'reviews';
    protected string $model = Review::class;
}
