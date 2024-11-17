<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Route;

interface RouteRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Route;
    public function save(Route $route): Route;
    public function update(Route $route): Route;
    public function delete(int $id): bool;
}
