<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class ArtistSkill extends Model
{
    protected string $table = 'artist_skills';

    protected array $fillable = ['artist_id', 'skill_id'];
}
