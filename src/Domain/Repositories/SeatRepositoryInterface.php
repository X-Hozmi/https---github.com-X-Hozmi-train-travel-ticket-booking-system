<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Seat;

interface SeatRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Seat;
    public function save(Seat $seat): bool;
    public function update(Seat $seat): bool;
    public function delete(int $id): bool;
}
