<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Report;

final class ReportRepository extends Repository
{
    protected string $table = 'reports';
    protected string $model = Report::class;
}
