<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class ArtistProfile extends Model
{
    protected string $table = 'artist_profiles';

    protected array $fillable = ['user_id', 'category_id', 'headline', 'bio', 'city', 'hourly_rate', 'experience_years', 'available'];
}
