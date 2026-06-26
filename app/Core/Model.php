<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Lightweight active-record-ish base. Subclasses set $table and $fillable.
 * Data is held in an array and exposed through __get/__set for ergonomics.
 */
abstract class Model
{
    protected string $table = '';
    protected string $primaryKey = 'id';

    /** @var array<int, string> */
    protected array $fillable = [];

    /** @var array<string, mixed> */
    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes): static
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
        return $this;
    }

    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        return isset($this->attributes[$name]);
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return $this->attributes;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getKeyName(): string
    {
        return $this->primaryKey;
    }

    /** @return array<int, string> */
    public function getFillable(): array
    {
        return $this->fillable;
    }
}
