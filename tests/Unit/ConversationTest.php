<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Conversation;

final class ConversationTest extends TestCase
{
    public function run(): void
    {
        $model = new Conversation(['subject' => 'sample']);

        $this->assertEquals('conversations', $model->getTable());
        $this->assertEquals('sample', (string) $model->subject);
        $this->assertTrue(in_array('subject', $model->getFillable(), true));
    }
}
