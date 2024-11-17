<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Time;
use Src\Domain\Repositories\TimeRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class TimeRepositoryImpl implements TimeRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM times WHERE is_deleted = 0';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Time
    {
        $sql = 'SELECT * FROM times WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $time = new Time();
            $time->id = $data['id'];
            $time->arrival = $data['arrival'];
            $time->departure = $data['departure'];
            $time->isDeleted = $data['is_deleted'];
            return $time;
        }

        return null;
    }

    public function save(Time $time): Time
    {
        $sql = 'INSERT INTO times (arrival, departure) VALUES (?, ?)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$time->arrival, $time->departure]);
        $time->id = $this->db->lastInsertId();
        return $time;
    }

    public function update(Time $time): Time
    {
        $sql = 'UPDATE times SET arrival = ?, departure = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$time->arrival, $time->departure, $time->id]);
        return $time;
    }

    public function delete(int $id): bool
    {
        $sql = 'UPDATE times SET is_deleted = 1 WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
