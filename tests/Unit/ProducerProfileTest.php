<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\ProducerProfile;

final class ProducerProfileTest extends TestCase
{
    public function run(): void
    {
        $model = new ProducerProfile(['company' => 'sample']);

        $this->assertEquals('producer_profiles', $model->getTable());
        $this->assertEquals('sample', (string) $model->company);
        $this->assertTrue(in_array('company', $model->getFillable(), true));
    }
}
