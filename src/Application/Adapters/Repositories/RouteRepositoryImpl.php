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
