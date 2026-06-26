<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Generic table-gateway base. Subclasses declare $table and $model.
 * Provides CRUD plus a small fluent-ish where() helper.
 */
abstract class Repository
{
    protected string $table = '';

    /** @var class-string<Model> */
    protected string $model = Model::class;

    protected function hydrate(?array $row): ?Model
    {
        return $row === null ? null : new $this->model($row);
    }

    /** @return array<int, Model> */
    public function all(string $orderBy = 'id', string $direction = 'DESC'): array
    {
        $rows = Database::select("SELECT * FROM {$this->table} ORDER BY {$orderBy} {$direction}");
        return array_map(fn (array $r) => new $this->model($r), $rows);
    }

    public function find(int $id): ?Model
    {
        return $this->hydrate(
            Database::selectOne("SELECT * FROM {$this->table} WHERE id = ? LIMIT 1", [$id])
        );
    }

    public function findBy(string $column, mixed $value): ?Model
    {
        return $this->hydrate(
            Database::selectOne("SELECT * FROM {$this->table} WHERE {$column} = ? LIMIT 1", [$value])
        );
    }

    /** @return array<int, Model> */
    public function where(string $column, mixed $value, string $orderBy = 'id', string $direction = 'DESC'): array
    {
        $rows = Database::select(
            "SELECT * FROM {$this->table} WHERE {$column} = ? ORDER BY {$orderBy} {$direction}",
            [$value]
        );
        return array_map(fn (array $r) => new $this->model($r), $rows);
    }

    public function create(array $data): int
    {
        $columns = array_keys($data);
        $placeholders = array_map(static fn ($c) => ':' . $c, $columns);
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->table,
            implode(', ', $columns),
            implode(', ', $placeholders),
        );
        return Database::insert($sql, $data);
    }

    public function update(int $id, array $data): bool
    {
        $assignments = implode(', ', array_map(static fn ($c) => "{$c} = :{$c}", array_keys($data)));
        $data['id'] = $id;
        return Database::statement("UPDATE {$this->table} SET {$assignments} WHERE id = :id", $data);
    }

    public function delete(int $id): bool
    {
        return Database::statement("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function count(): int
    {
        $row = Database::selectOne("SELECT COUNT(*) AS c FROM {$this->table}");
        return (int) ($row['c'] ?? 0);
    }
}
