<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\ArtistSkill;

final class ArtistSkillTest extends TestCase
{
    public function run(): void
    {
        $model = new ArtistSkill(['artist_id' => 'sample']);

        $this->assertEquals('artist_skills', $model->getTable());
        $this->assertEquals('sample', (string) $model->artist_id);
        $this->assertTrue(in_array('artist_id', $model->getFillable(), true));
    }
}
