<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Booking;

final class BookingTest extends TestCase
{
    public function run(): void
    {
        $model = new Booking(['status' => 'sample']);

        $this->assertEquals('bookings', $model->getTable());
        $this->assertEquals('sample', (string) $model->status);
        $this->assertTrue(in_array('status', $model->getFillable(), true));
    }
}
