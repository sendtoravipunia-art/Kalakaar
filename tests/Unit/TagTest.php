<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Tag;

final class TagTest extends TestCase
{
    public function run(): void
    {
        $model = new Tag(['name' => 'sample']);

        $this->assertEquals('tags', $model->getTable());
        $this->assertEquals('sample', (string) $model->name);
        $this->assertTrue(in_array('name', $model->getFillable(), true));
    }
}
