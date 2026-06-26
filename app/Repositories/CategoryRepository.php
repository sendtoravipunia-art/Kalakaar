<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Category;

final class CategoryRepository extends Repository
{
    protected string $table = 'categories';
    protected string $model = Category::class;
}
