<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\User;
use Src\Domain\Repositories\UserRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class UserRepositoryImpl implements UserRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT id, id_number, name, username, email, role, is_deleted FROM users WHERE is_deleted = 0';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?User
    {
        $sql = 'SELECT * FROM users WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new User();
            $user->id = (int)$data['id'];
            $user->idNumber = (int)$data['id_number'];
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->role = $data['role'];
            $user->isDeleted = (int)$data['is_deleted'];
            return $user;
        }

        return null;
    }

    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT * FROM users WHERE email = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new User();
            $user->id = (int)$data['id'];
            $user->idNumber = (int)$data['id_number'];
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->role = $data['role'];
            $user->isDeleted = (int)$data['is_deleted'];
            return $user;
        }

        return null;
    }

    public function save(User $user): bool
    {
        $sql = 'INSERT INTO users (id_number, name, address, username, phone_number, email, password, role) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $user->idNumber,
            $user->name,
            $user->address,
            $user->username,
            $user->phoneNumber,
            $user->email,
            password_hash($user->password, PASSWORD_DEFAULT),
            $user->role,
        ]);
    }

    public function login(string $username, string $password)
    {
        $sql = 'SELECT * FROM users WHERE username = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return null;
    }

    public function update(User $user): bool
    {
        $sql = 'UPDATE users SET id_number = ?, name = ?, email = ?, password = ?, role = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $user->idNumber,
            $user->name,
            $user->email,
            $user->password,
            $user->role,
            $user->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'UPDATE users SET is_deleted = 1 WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function storeRefreshToken(int $userId, string $refreshToken): bool
    {
        $sql = 'UPDATE users SET refresh_token = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$refreshToken, $userId]);
    }

    public function verifyRefreshToken(int $userId, string $refreshToken): bool
    {
        $sql = 'SELECT refresh_token FROM users WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result && $result['refresh_token'] === $refreshToken;
    }

    public function removeRefreshToken(int $userId): bool
    {
        $sql = 'UPDATE users SET refresh_token = NULL WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId]);
    }
}
