<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\HireRequest;

final class HireRequestTest extends TestCase
{
    public function run(): void
    {
        $model = new HireRequest(['title' => 'sample']);

        $this->assertEquals('hire_requests', $model->getTable());
        $this->assertEquals('sample', (string) $model->title);
        $this->assertTrue(in_array('title', $model->getFillable(), true));
    }
}
