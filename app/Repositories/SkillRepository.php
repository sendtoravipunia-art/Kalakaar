<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Skill;

final class SkillRepository extends Repository
{
    protected string $table = 'skills';
    protected string $model = Skill::class;
}
