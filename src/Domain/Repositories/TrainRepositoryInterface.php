<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Train;

interface TrainRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Train;
    public function save(Train $train): Train;
    public function update(Train $train): Train;
    public function delete(int $id): bool;
}
