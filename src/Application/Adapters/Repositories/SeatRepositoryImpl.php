<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Seat;
use Src\Domain\Repositories\SeatRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class SeatRepositoryImpl implements SeatRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM seats WHERE is_deleted = 0';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Seat
    {
        $sql = 'SELECT * FROM seats WHERE id = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $seat = new Seat();
            $seat->id = (int)$data['id'];
            $seat->trainId = (int)$data['train_id'];
            $seat->carriageNumber = (int)$data['carriage_number'];
            $seat->seatNumber = (string)$data['seat_number'];
            $seat->seatType = $data['seat_type'];
            $seat->isAvailable = (int)$data['is_available'];
            $seat->isDeleted = (int)$data['is_deleted'];
            return $seat;
        }

        return null;
    }

    public function save(Seat $seat): bool
    {
        $sql = 'INSERT INTO seats (train_id, carriage_number, seat_number, seat_type, is_available) 
                VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $seat->trainId,
            $seat->carriageNumber,
            $seat->seatNumber,
            $seat->seatType,
            $seat->isAvailable,
        ]);
    }

    public function update(Seat $seat): bool
    {
        $sql = 'UPDATE seats SET train_id = ?, carriage_number = ?, seat_number = ?, 
                seat_type = ?, is_available = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $seat->trainId,
            $seat->carriageNumber,
            $seat->seatNumber,
            $seat->seatType,
            $seat->isAvailable,
            $seat->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'UPDATE seats SET is_deleted = 1 WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
