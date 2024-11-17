<?php

namespace Src\Application\Adapters\Repositories;

use PDO;
use Src\Domain\Entities\Payment;
use Src\Domain\Repositories\PaymentRepositoryInterface;
use Src\Infrastructure\Databases\DatabaseConnection;

class PaymentRepositoryImpl implements PaymentRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    public function show(): array
    {
        $sql = 'SELECT * FROM payments';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?Payment
    {
        $sql = 'SELECT * FROM payments WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $payment = new Payment();
            $payment->id = $data['id'];
            $payment->orderId = $data['order_id'];
            $payment->amount = $data['amount'];
            $payment->paymentMethod = $data['payment_method'];
            $payment->transactionId = $data['transaction_id'];
            $payment->status = $data['status'];
            $payment->isDeleted = $data['is_deleted'];
            return $payment;
        }

        return null;
    }

    public function save(Payment $payment): bool
    {
        $sql = 'INSERT INTO payments (order_id, amount, payment_method, transaction_id, status) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $payment->orderId,
            $payment->amount,
            $payment->paymentMethod,
            $payment->transactionId,
            $payment->status,
        ]);
    }

    public function update(Payment $payment): bool
    {
        $sql = 'UPDATE payments SET order_id = ?, amount = ?, payment_method = ?, transaction_id = ?, status = ?, WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $payment->orderId,
            $payment->amount,
            $payment->paymentMethod,
            $payment->transactionId,
            $payment->status,
            $payment->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM payments WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
