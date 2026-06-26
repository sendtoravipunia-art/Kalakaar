<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\PortfolioItem;

final class PortfolioItemRepository extends Repository
{
    protected string $table = 'portfolio_items';
    protected string $model = PortfolioItem::class;
}
