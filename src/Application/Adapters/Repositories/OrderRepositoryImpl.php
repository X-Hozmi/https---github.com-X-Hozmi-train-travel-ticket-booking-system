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
        $sql = 'SELECT * FROM orders WHERE is_deleted = 0';
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
            $order->seats = $data['seats'];
            $order->adultPassenger = (int)$data['adult_passenger'];
            $order->childPassenger = (int)$data['child_passenger'];
            $order->status = $data['status'];
            $order->totalAmount = (float)$data['total_amount'];
            $order->isDeleted = (int)$data['is_deleted'];
            return $order;
        }

        return null;
    }

    public function find(array $data): array
    {
        $train_id = $data['train_id'];
        $date_reservation = $data['date_reservation'];

        $sqlKursi = 'SELECT * FROM orders WHERE train_id = ? AND date_reservation = ? AND is_deleted = 0';
        $stmt = $this->db->prepare($sqlKursi);
        $stmt->execute([$train_id, $date_reservation]);
        $dataKursi = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($dataKursi)) {
            return [];
        }

        $seats = [];
        foreach ($dataKursi as $row) {
            $seats = array_merge($seats, explode(',', str_replace(' ', '', $row['seats'])));
        }

        return ['seats' => $seats];
    }

    public function findToPrint(int $id): array
    {
        $sql = 'SELECT
                    a.adult_passenger,
                    a.child_passenger,
                    a.date_reservation,
                    a.seats,
                    a.total_amount,
                    b.name passenger_name,
                    c.name train_name,
                    c.class,
                    d.source,
                    d.destination,
                    e.arrival,
                    e.departure
                FROM orders a
                LEFT JOIN users b
                    ON a.user_id = b.id
                LEFT JOIN trains c
                    ON a.train_id = c.id
                LEFT JOIN routes d
                    ON c.route_id = d.id
                LEFT JOIN times e
                    ON c.time_id = e.id
                WHERE a.id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function save(Order $order): ?int
    {
        $sql = 'INSERT INTO orders (user_id, train_id, seats, adult_passenger, child_passenger, date_reservation, status, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([
            $order->userId,
            $order->trainId,
            $order->seats,
            $order->adultPassenger,
            $order->childPassenger,
            $order->dateReservation,
            $order->status,
            $order->totalAmount,
        ])) {
            return (int)$this->db->lastInsertId();
        }

        return null;
    }

    public function update(Order $order): bool
    {
        $sql = 'UPDATE orders SET user_id = ?, train_id = ?, seats = ?, adult_passenger = ?, child_passenger = ?, date_reservation = ?, status = ?, total_amount = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $order->userId,
            $order->trainId,
            $order->seats,
            $order->adultPassenger,
            $order->childPassenger,
            $order->dateReservation,
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
