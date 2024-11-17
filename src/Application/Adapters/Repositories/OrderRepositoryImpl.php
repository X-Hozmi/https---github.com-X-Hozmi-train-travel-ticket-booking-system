<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Order;
use Src\Domain\Repositories\OrderRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class OrderRepositoryImpl implements OrderRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM orders';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Order
    {
        $sql = 'SELECT * FROM orders WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $order = new Order();
            $order->id = (int)$data['id'];
            $order->userId = (int)$data['user_id'];
            $order->trainId = (int)$data['train_id'];
            $order->seatId = (int)$data['seat_id'];
            $order->adultPassenger = (int)$data['adult_passenger'];
            $order->childPassenger = (int)$data['child_passenger'];
            $order->status = $data['status'];
            $order->totalAmount = $data['total_amount'];
            $order->isDeleted = (int)$data['is_deleted'];
            return $order;
        }

        return null;
    }

    public function save(Order $order): bool
    {
        $sql = 'INSERT INTO orders (user_id, train_id, seat_id, adult_passenger, child_passenger, status, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $order->userId,
            $order->trainId,
            $order->seatId,
            $order->adultPassenger,
            $order->childPassenger,
            $order->status,
            $order->totalAmount,
        ]);
    }

    public function update(Order $order): bool
    {
        $sql = 'UPDATE orders SET user_id = ?, train_id = ?, seat_id = ?, adult_passenger = ?, child_passenger = ?, status = ?, total_amount = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $order->userId,
            $order->trainId,
            $order->seatId,
            $order->adultPassenger,
            $order->childPassenger,
            $order->status,
            $order->totalAmount,
            $order->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM orders WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
