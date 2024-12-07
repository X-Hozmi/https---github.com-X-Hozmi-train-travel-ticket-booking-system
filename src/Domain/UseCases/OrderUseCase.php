<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Order;
use Src\Domain\Repositories\OrderRepositoryInterface;

class OrderUseCase
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders(): array
    {
        return $this->orderRepository->show();
    }

    public function getOrderById(int $id): ?Order
    {
        return $this->orderRepository->findById($id);
    }

    public function checkOrderSchedule(array $data): array
    {
        return $this->orderRepository->find($data);
    }

    public function getOrderToPrint(int $id): array
    {
        return $this->orderRepository->findToPrint($id);
    }

    public function createOrder(Order $order): ?int
    {
        return $this->orderRepository->save($order);
    }

    public function updateOrder(Order $order): bool
    {
        return $this->orderRepository->update($order);
    }

    public function deleteOrder(int $id): bool
    {
        return $this->orderRepository->delete($id);
    }
}
