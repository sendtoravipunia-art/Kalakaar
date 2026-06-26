<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Category;

final class CategoryTest extends TestCase
{
    public function run(): void
    {
        $model = new Category(['name' => 'sample']);

        $this->assertEquals('categories', $model->getTable());
        $this->assertEquals('sample', (string) $model->name);
        $this->assertTrue(in_array('name', $model->getFillable(), true));
    }
}
