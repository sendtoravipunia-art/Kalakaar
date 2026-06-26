<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\PortfolioItem;

final class PortfolioItemTest extends TestCase
{
    public function run(): void
    {
        $model = new PortfolioItem(['title' => 'sample']);

        $this->assertEquals('portfolio_items', $model->getTable());
        $this->assertEquals('sample', (string) $model->title);
        $this->assertTrue(in_array('title', $model->getFillable(), true));
    }
}
