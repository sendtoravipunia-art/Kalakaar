<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Repository;
use App\Models\Booking;

final class BookingRepository extends Repository
{
    protected string $table = 'bookings';
    protected string $model = Booking::class;
}
