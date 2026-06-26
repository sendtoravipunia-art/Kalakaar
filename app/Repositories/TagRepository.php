<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Tag;

final class TagRepository extends Repository
{
    protected string $table = 'tags';
    protected string $model = Tag::class;
}
