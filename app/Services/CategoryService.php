<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Model;
use App\Repositories\CategoryRepository;

final class CategoryService
{
    public function __construct(
        private readonly CategoryRepository $repository = new CategoryRepository(),
    ) {
    }

    /** @return array<int, Model> */
    public function all(): array
    {
        return $this->repository->all();
    }

    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function count(): int
    {
        return $this->repository->count();
    }
}
