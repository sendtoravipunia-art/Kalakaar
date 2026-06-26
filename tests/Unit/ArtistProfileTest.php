<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\ArtistProfile;

final class ArtistProfileTest extends TestCase
{
    public function run(): void
    {
        $model = new ArtistProfile(['headline' => 'sample']);

        $this->assertEquals('artist_profiles', $model->getTable());
        $this->assertEquals('sample', (string) $model->headline);
        $this->assertTrue(in_array('headline', $model->getFillable(), true));
    }
}
