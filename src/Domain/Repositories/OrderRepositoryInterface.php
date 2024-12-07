<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Order;

interface OrderRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Order;
    public function find(array $data): array;
    public function findToPrint(int $id): array;
    public function save(Order $order): ?int;
    public function update(Order $order): bool;
    public function delete(int $id): bool;
}
