<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class SavedArtist extends Model
{
    protected string $table = 'saved_artists';

    protected array $fillable = ['producer_id', 'artist_id'];
}
