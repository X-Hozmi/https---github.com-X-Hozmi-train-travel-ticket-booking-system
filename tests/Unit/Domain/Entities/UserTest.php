<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\User;
use Tests\TestCase;

#[CoversClass(User::class)]
class UserTest extends TestCase
{
    public function testUserCreation()
    {
        $user = new User();
        $user->id = 1;
        $user->idNumber = 12345;
        $user->name = 'John Doe';
        $user->username = 'johndoe';
        $user->email = 'john@example.com';
        $user->password = 'password123';
        $user->role = 'client';

        $this->assertEquals(1, $user->id);
        $this->assertEquals(12345, $user->idNumber);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('johndoe', $user->username);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertEquals('password123', $user->password);
        $this->assertEquals('client', $user->role);
    }
}
