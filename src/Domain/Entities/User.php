<?php

namespace Src\Domain\Entities;

class User
{
    public int $id;
    public ?int $idNumber;
    public string $name;
    public string $address;
    public ?string $username;
    public ?int $phoneNumber;
    public string $email;
    public string $password;
    public ?string $role;
    public ?int $isDeleted;
}
