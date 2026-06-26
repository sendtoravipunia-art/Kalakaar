<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class PortfolioItem extends Model
{
    protected string $table = 'portfolio_items';

    protected array $fillable = ['artist_id', 'title', 'media_type', 'url', 'description'];
}
