<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Model;
use App\Repositories\ProducerProfileRepository;

final class ProducerProfileService
{
    public function __construct(
        private readonly ProducerProfileRepository $repository = new ProducerProfileRepository(),
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
