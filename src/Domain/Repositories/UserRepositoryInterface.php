<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function show(): array;
    public function findById(int $id): ?User;
    public function findByEmail(string $email): ?User;
    public function save(User $user): User;
    public function login(string $username, string $password);
    public function update(User $user): User;
    public function delete(int $id): bool;
    public function storeRefreshToken(int $userId, string $refreshToken): bool;
    public function verifyRefreshToken(int $userId, string $refreshToken): bool;
    public function removeRefreshToken(int $userId): bool;
}
