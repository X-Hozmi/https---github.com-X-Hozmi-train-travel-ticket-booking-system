<?php

namespace Src\Presentation\Controllers;

use Src\Application\Adapters\Repositories\OrderRepositoryImpl;
use Src\Application\Services\PDFService;
use Src\Domain\UseCases\OrderUseCase;

class WebInvoicePrinterController
{
    private OrderUseCase $orderUseCase;

    public function __construct()
    {
        $orderRepository = new OrderRepositoryImpl();
        $this->orderUseCase = new OrderUseCase($orderRepository);
    }

    public function index(int $id): void
    {
        $template = file_get_contents(__DIR__ . '../Views/Templates/invoice/invoice.html');

        $order = $this->orderUseCase->getOrderById($id);

        PDFService::render($template);
    }
}
