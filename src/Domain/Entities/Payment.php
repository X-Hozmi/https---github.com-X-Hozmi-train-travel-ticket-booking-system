<?php

namespace Src\Domain\Entities;

class Payment
{
    public int $id;
    public int $orderId;
    public float $amount;
    public ?string $paymentMethod;
    public string $transactionId;
    public ?string $status;
    public ?int $isDeleted;
}
