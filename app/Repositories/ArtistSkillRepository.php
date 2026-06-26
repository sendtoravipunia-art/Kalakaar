<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\ArtistSkill;

final class ArtistSkillRepository extends Repository
{
    protected string $table = 'artist_skills';
    protected string $model = ArtistSkill::class;
}
