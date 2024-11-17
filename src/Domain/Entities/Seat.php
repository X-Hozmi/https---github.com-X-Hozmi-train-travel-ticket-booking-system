<?php

namespace Src\Domain\Entities;

class Seat
{
    public int $id;
    public int $trainId;
    public int $carriageNumber;
    public string $seatNumber;
    public string $seatType;
    public ?int $isAvailable;
    public ?int $isDeleted;
}
