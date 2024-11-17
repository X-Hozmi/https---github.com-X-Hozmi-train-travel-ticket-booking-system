<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Train;
use Src\Domain\Repositories\TrainRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class TrainRepositoryImpl implements TrainRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM trains WHERE is_deleted = 0';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Train
    {
        $sql = 'SELECT * FROM trains WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $train = new Train();
            $train->id = (int)$data['id'];
            $train->routeId = (int)$data['route_id'];
            $train->timeId = (int)$data['time_id'];
            $train->name = $data['name'];
            $train->class = $data['class'];
            $train->capacity = (int)$data['capacity'];
            $train->carriages = (int)$data['carriages'];
            $train->price = $data['price'];
            $train->status = $data['status'];
            $train->isDeleted = (int)$data['is_deleted'];
            return $train;
        }

        return null;
    }

    public function save(Train $train): bool
    {
        $sql = 'INSERT INTO trains (route_id, time_id, name, class, capacity, carriages, price, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $train->routeId,
            $train->timeId,
            $train->name,
            $train->class,
            $train->capacity,
            $train->carriages,
            $train->price,
            $train->status,
        ]);
    }

    public function update(Train $train): bool
    {
        $sql = 'UPDATE trains SET route_id = ?, time_id = ?, name = ?, class = ?, 
                capacity = ?, carriages = ?, price = ?, status = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $train->routeId,
            $train->timeId,
            $train->name,
            $train->class,
            $train->capacity,
            $train->carriages,
            $train->price,
            $train->status,
            $train->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'UPDATE trains SET is_deleted = 1 WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
