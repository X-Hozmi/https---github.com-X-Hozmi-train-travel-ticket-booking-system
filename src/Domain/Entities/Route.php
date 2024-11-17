<?php

namespace Src\Domain\Entities;

class Route
{
    public int $id;
    public string $source;
    public string $destination;
    public ?int $isDeleted;
}
