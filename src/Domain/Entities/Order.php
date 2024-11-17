<?php

namespace Src\Domain\Entities;

class Order
{
    public int $id;
    public int $userId;
    public int $trainId;
    public int $seatId;
    public int $adultPassenger;
    public int $childPassenger;
    public ?string $status;
    public float $totalAmount;
    public ?int $isDeleted;
}
