<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\ProducerProfile;

final class ProducerProfileRepository extends Repository
{
    protected string $table = 'producer_profiles';
    protected string $model = ProducerProfile::class;
}
