<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Core\TestCase;
use App\Models\Skill;

final class SkillTest extends TestCase
{
    public function run(): void
    {
        $model = new Skill(['name' => 'sample']);

        $this->assertEquals('skills', $model->getTable());
        $this->assertEquals('sample', (string) $model->name);
        $this->assertTrue(in_array('name', $model->getFillable(), true));
    }
}
