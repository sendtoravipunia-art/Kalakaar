<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

final class Report extends Model
{
    protected string $table = 'reports';

    protected array $fillable = ['reporter_id', 'target_type', 'target_id', 'reason'];
}
