<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Payment;
use Src\Domain\Repositories\PaymentRepositoryInterface;

class PaymentUseCase
{
    private PaymentRepositoryInterface $orderRepository;

    public function __construct(PaymentRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllPayments(): array
    {
        return $this->orderRepository->show();
    }

    public function getPaymentById(int $id): ?Payment
    {
        return $this->orderRepository->findById($id);
    }

    public function createPayment(Payment $order): bool
    {
        return $this->orderRepository->save($order);
    }

    public function updatePayment(Payment $order): bool
    {
        return $this->orderRepository->update($order);
    }

    public function deletePayment(int $id): bool
    {
        return $this->orderRepository->delete($id);
    }
}
