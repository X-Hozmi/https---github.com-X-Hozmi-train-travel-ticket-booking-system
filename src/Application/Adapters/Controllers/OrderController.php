<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\OrderRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Order;
use Src\Domain\UseCases\OrderUseCase;

class OrderController
{
    private OrderUseCase $orderUseCase;

    public function __construct()
    {
        $orderRepository = new OrderRepositoryImpl();
        $this->orderUseCase = new OrderUseCase($orderRepository);
    }

    public function index()
    {
        try {
            $orders = $this->orderUseCase->getAllOrders();

            ResponseService::success($orders);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $order = $this->orderUseCase->getOrderById($id);

            if (! $order) {
                throw new \Exception('Order not found');
            }

            ResponseService::success($order);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $order = new Order();
            $order->userId = $data['user_id'];
            $order->trainId = $data['train_id'];
            $order->seatId = $data['seat_id'];
            $order->adultPassenger = $data['adult_passenger'];
            $order->childPassenger = $data['child_passenger'];
            $order->totalAmount = $data['total_amount'];
            $order->status = $data['status'] ?? 'pending';

            $this->orderUseCase->createOrder($order);

            ResponseService::created();
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $order = $this->orderUseCase->getOrderById($id);
            if (! $order) {
                throw new \Exception('Order not found');
            }

            $order->userId = $data['user_id'] ?? $order->userId;
            $order->trainId = $data['train_id'] ?? $order->trainId;
            $order->seatId = $data['seat_id'] ?? $order->seatId;
            $order->adultPassenger = $data['adult_passenger'] ?? $order->adultPassenger;
            $order->childPassenger = $data['child_assenger'] ?? $order->childPassenger;
            $order->totalAmount = $data['total_amount'] ?? $order->totalAmount;
            $order->status = $data['status'] ?? $order->status;

            $this->orderUseCase->updateOrder($order);

            ResponseService::success();
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->orderUseCase->deleteOrder($id);

            if (! $result) {
                throw new \Exception('Failed to delete order');
            }

            ResponseService::success([], $message = 'Order deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
