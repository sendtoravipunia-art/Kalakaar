<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base class for database seeders. Subclasses implement run().
 */
abstract class Seeder
{
    abstract public function run(): void;

    protected function insert(string $table, array $row): void
    {
        $columns = array_keys($row);
        $placeholders = array_map(static fn ($c) => ':' . $c, $columns);
        Database::statement(
            sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', $columns), implode(', ', $placeholders)),
            $row,
        );
    }

    protected function truncate(string $table): void
    {
        Database::statement("DELETE FROM {$table}");
    }
}
