<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Station;
use Src\Domain\Repositories\StationRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class StationRepositoryImpl implements StationRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM stations WHERE is_deleted = 0';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Station
    {
        $sql = 'SELECT * FROM stations WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $station = new Station();
            $station->id = (int)$data['id'];
            $station->code = $data['code'];
            $station->name = $data['name'];
            $station->city = $data['city'];
            $station->cityName = $data['city_name'];
            $station->isDeleted = (int)$data['is_deleted'];
            return $station;
        }

        return null;
    }

    public function save(Station $station): bool
    {
        $sql = 'INSERT INTO stations (code, name, city, city_name) VALUES (?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $station->code,
            $station->name,
            $station->city,
            $station->cityName,
        ]);
    }

    public function update(Station $station): bool
    {
        $sql = 'UPDATE stations SET code = ?, name = ?, city = ?, city_name = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $station->code,
            $station->name,
            $station->city,
            $station->cityName,
            $station->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'UPDATE stations SET is_deleted = 1 WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
