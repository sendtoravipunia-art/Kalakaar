<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Review;

final class ReviewTest extends TestCase
{
    public function run(): void
    {
        $model = new Review(['comment' => 'sample']);

        $this->assertEquals('reviews', $model->getTable());
        $this->assertEquals('sample', (string) $model->comment);
        $this->assertTrue(in_array('comment', $model->getFillable(), true));
    }
}
