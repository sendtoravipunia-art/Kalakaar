<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\ArtistProfile;

final class ArtistProfileRepository extends Repository
{
    protected string $table = 'artist_profiles';
    protected string $model = ArtistProfile::class;
}
