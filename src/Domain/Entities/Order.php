<?php

namespace Src\Domain\Entities;

class Order
{
    public int $id;
    public int $userId;
    public int $trainId;
    public string $seats;
    public int $adultPassenger;
    public int $childPassenger;
    public string $dateReservation;
    public ?string $status;
    public float $totalAmount;
    public ?int $isDeleted;
}
