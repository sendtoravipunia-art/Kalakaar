<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\SavedArtist;

final class SavedArtistTest extends TestCase
{
    public function run(): void
    {
        $model = new SavedArtist(['producer_id' => 'sample']);

        $this->assertEquals('saved_artists', $model->getTable());
        $this->assertEquals('sample', (string) $model->producer_id);
        $this->assertTrue(in_array('producer_id', $model->getFillable(), true));
    }
}
