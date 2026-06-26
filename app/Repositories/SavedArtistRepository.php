<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\SavedArtist;

final class SavedArtistRepository extends Repository
{
    protected string $table = 'saved_artists';
    protected string $model = SavedArtist::class;
}
