<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Message;

final class MessageTest extends TestCase
{
    public function run(): void
    {
        $model = new Message(['body' => 'sample']);

        $this->assertEquals('messages', $model->getTable());
        $this->assertEquals('sample', (string) $model->body);
        $this->assertTrue(in_array('body', $model->getFillable(), true));
    }
}
