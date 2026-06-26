<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Notification;

final class NotificationTest extends TestCase
{
    public function run(): void
    {
        $model = new Notification(['message' => 'sample']);

        $this->assertEquals('notifications', $model->getTable());
        $this->assertEquals('sample', (string) $model->message);
        $this->assertTrue(in_array('message', $model->getFillable(), true));
    }
}
