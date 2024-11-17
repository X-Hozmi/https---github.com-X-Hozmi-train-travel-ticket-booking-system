<?php

namespace Src\Domain\Entities;

class Time
{
    public int $id;
    public string $arrival;
    public string $departure;
    public ?int $isDeleted;
}
