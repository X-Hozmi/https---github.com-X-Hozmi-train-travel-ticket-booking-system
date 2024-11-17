<?php

namespace Src\Domain\Entities;

class Train
{
    public int $id;
    public int $routeId;
    public int $timeId;
    public string $name;
    public string $class;
    public ?int $capacity;
    public ?int $carriages;
    public float $price;
    public ?string $status;
    public ?int $isDeleted;
}
