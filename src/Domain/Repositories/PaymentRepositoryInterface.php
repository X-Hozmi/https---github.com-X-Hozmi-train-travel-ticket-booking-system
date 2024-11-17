<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\Payment;

interface PaymentRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?Payment;
    public function save(Payment $order): bool;
    public function update(Payment $order): bool;
    public function delete(int $id): bool;
}
