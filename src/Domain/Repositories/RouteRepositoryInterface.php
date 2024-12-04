<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Route;

interface RouteRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Route;
    public function find(array $data): array;
    public function save(Route $route): bool;
    public function update(Route $route): bool;
    public function delete(int $id): bool;
}
