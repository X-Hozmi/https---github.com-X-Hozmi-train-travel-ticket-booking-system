<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Station;

interface StationRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Station;
    public function save(Station $station): bool;
    public function update(Station $station): bool;
    public function delete(int $id): bool;
}
