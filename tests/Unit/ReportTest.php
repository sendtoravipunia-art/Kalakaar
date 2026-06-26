<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Report;

final class ReportTest extends TestCase
{
    public function run(): void
    {
        $model = new Report(['reason' => 'sample']);

        $this->assertEquals('reports', $model->getTable());
        $this->assertEquals('sample', (string) $model->reason);
        $this->assertTrue(in_array('reason', $model->getFillable(), true));
    }
}
