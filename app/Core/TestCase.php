<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Tiny zero-dependency test base so the suite runs without PHPUnit.
 * Subclasses implement run() and call the assert* helpers.
 */
abstract class TestCase
{
    private int $passed = 0;
    /** @var array<int, string> */
    private array $failures = [];

    abstract public function run(): void;

    protected function assertTrue(bool $condition, string $message = ''): void
    {
        $this->record($condition, $message ?: 'Failed asserting that condition is true.');
    }

    protected function assertFalse(bool $condition, string $message = ''): void
    {
        $this->record(!$condition, $message ?: 'Failed asserting that condition is false.');
    }

    protected function assertEquals(mixed $expected, mixed $actual, string $message = ''): void
    {
        $this->record(
            $expected === $actual,
            $message ?: sprintf('Expected %s, got %s.', var_export($expected, true), var_export($actual, true)),
        );
    }

    protected function assertNotNull(mixed $value, string $message = ''): void
    {
        $this->record($value !== null, $message ?: 'Failed asserting that value is not null.');
    }

    private function record(bool $ok, string $message): void
    {
        if ($ok) {
            $this->passed++;
        } else {
            $this->failures[] = static::class . ': ' . $message;
        }
    }

    /** @return array{passed:int, failures:array<int,string>} */
    public function results(): array
    {
        return ['passed' => $this->passed, 'failures' => $this->failures];
    }
}
