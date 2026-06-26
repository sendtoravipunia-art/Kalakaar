<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\HireRequest;

final class HireRequestRepository extends Repository
{
    protected string $table = 'hire_requests';
    protected string $model = HireRequest::class;
}
