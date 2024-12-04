<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Route;
use Src\Domain\Repositories\RouteRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class RouteRepositoryImpl implements RouteRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM routes WHERE is_deleted = 0';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Route
    {
        $sql = 'SELECT * FROM routes WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $route = new Route();
            $route->id = (int)$data['id'];
            $route->source = $data['source'];
            $route->destination = $data['destination'];
            $route->isDeleted = (int)$data['is_deleted'];
            return $route;
        }

        return null;
    }

    public function find(array $data): array
    {
        $source = $data['source'];
        $destination = $data['destination'];
        $result = [
            'status' => true,
            'message' => 'Stasiun ditemukan',
        ];

        $sqlAsal = 'SELECT * FROM routes WHERE source = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sqlAsal);
        $stmt->execute([$source]);
        $dataAsal = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($dataAsal)) {
            return [
                'status' => false,
                'message' => 'Stasiun asal tidak ditemukan',
            ];
        }

        $sqlTujuan = 'SELECT * FROM routes WHERE destination = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sqlTujuan);
        $stmt->execute([$destination]);
        $dataTujuan = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($dataTujuan)) {
            return [
                'status' => false,
                'message' => 'Stasiun tujuan tidak ditemukan',
            ];
        }

        $sqlKereta = "SELECT a.*, b.arrival, b.departure FROM trains a LEFT JOIN times b ON a.time_id = b.id WHERE a.route_id = ? AND a.status = 'active' AND a.is_deleted = 0";
        $stmt = $this->db->prepare($sqlKereta);
        $stmt->execute([$dataTujuan['id']]);
        $dataKereta = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($dataKereta)) {
            return [
                'status' => false,
                'message' => 'Belum ada kereta untuk rute ini',
            ];
        }

        return array_merge($result, ['data' => ['route' => $dataTujuan, 'kereta' => $dataKereta]]);
    }

    public function save(Route $route): bool
    {
        $sql = 'INSERT INTO routes (source, destination) VALUES (?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$route->source, $route->destination]);
    }

    public function update(Route $route): bool
    {
        $sql = 'UPDATE routes SET source = ?, destination = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$route->source, $route->destination, $route->id]);
    }

    public function delete(int $id): bool
    {
        $sql = 'UPDATE routes SET is_deleted = 1 WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
