<?php

namespace Src\Domain\Entities;

class Station
{
    public int $id;
    public string $code;
    public string $name;
    public string $city;
    public string $cityName;
    public ?int $isDeleted;
}
