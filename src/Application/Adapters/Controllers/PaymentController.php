<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\PaymentRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Payment;
use Src\Domain\UseCases\PaymentUseCase;

class PaymentController
{
    private PaymentUseCase $paymentUseCase;

    public function __construct()
    {
        $paymentRepository = new PaymentRepositoryImpl();
        $this->paymentUseCase = new PaymentUseCase($paymentRepository);
    }

    public function index()
    {
        try {
            $payments = $this->paymentUseCase->getAllPayments();

            ResponseService::success($payments);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $payment = $this->paymentUseCase->getPaymentById($id);

            if (! $payment) {
                throw new \Exception('Payment not found');
            }

            ResponseService::success($payment);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $payment = new Payment();
            $payment->orderId = $data['order_id'];
            $payment->amount = $data['amount'];
            $payment->paymentMethod = $data['payment_method'];
            $payment->transactionId = $data['transaction_id'];
            $payment->status = $data['status'] ?? 'pending';

            $result = $this->paymentUseCase->createPayment($payment);

            ResponseService::created($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $payment = $this->paymentUseCase->getPaymentById($id);
            if (! $payment) {
                throw new \Exception('Payment not found');
            }

            $payment->orderId = $data['order_id'] ?? $payment->orderId;
            $payment->amount = $data['amount'] ?? $payment->amount;
            $payment->paymentMethod = $data['payment_method'] ?? $payment->paymentMethod;
            $payment->transactionId = $data['transaction_id'] ?? $payment->transactionId;
            $payment->status = $data['status'] ?? $payment->status;

            $result = $this->paymentUseCase->updatePayment($payment);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->paymentUseCase->deletePayment($id);

            if (! $result) {
                throw new \Exception('Failed to delete payment');
            }

            ResponseService::success($result, $message = 'Payment deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
