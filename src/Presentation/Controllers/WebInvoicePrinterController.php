<?php

namespace Src\Presentation\Controllers;

use DateTime;
use Exception;
use Src\Application\Adapters\Repositories\OrderRepositoryImpl;
use Src\Application\Services\PDFService;
use Src\Domain\UseCases\OrderUseCase;

class WebInvoicePrinterController
{
    private OrderUseCase $orderUseCase;
    private const TEMPLATE_PATH = __DIR__ . '/../Views/Templates/invoice/invoice.html';

    public function __construct()
    {
        $orderRepository = new OrderRepositoryImpl();
        $this->orderUseCase = new OrderUseCase($orderRepository);
    }

    public function index(int $id): void
    {
        try {
            $template = $this->loadTemplate();
            $order = $this->orderUseCase->getOrderToPrint($id);

            $processedData = $this->processOrderData($order, $id);
            $template = $this->replaceTemplateVariables($template, $processedData);

            PDFService::render($template);
        } catch (Exception $e) {
            // Log error or handle gracefully
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(['error' => 'Unable to generate ticket: ' . $e->getMessage()]);
            exit;
        }
    }

    private function loadTemplate(): string
    {
        if (! file_exists(self::TEMPLATE_PATH)) {
            throw new Exception('Template file not found');
        }
        return file_get_contents(self::TEMPLATE_PATH);
    }

    private function processOrderData(array $order, int $id): array
    {
        $dateReservation = new DateTime($order['date_reservation']);
        $passengersCount = (int)$order['adult_passenger'] + (int)$order['child_passenger'];

        return [
            'passenger_name' => $order['passenger_name'] ?? 'N/A',
            'booking_code' => $this->generateBookingCode($dateReservation, $passengersCount, $id),
            'id_number' => $this->generateIdNumber($dateReservation, $id),
            'train_name' => $order['train_name'] ?? 'Unknown Train',
            'train_class' => $order['class'] ?? 'N/A',
            'arrival_station' => $order['source'] ?? 'Unknown',
            'departure_station' => $order['destination'] ?? 'Unknown',
            'seats' => $order['seats'] ?? 'Unassigned',
            'reservation_date' => $dateReservation->format('Y-m-d H:i'),
            'total_passengers' => $passengersCount,
        ];
    }

    private function generateBookingCode(DateTime $date, int $passengerCount, int $id): string
    {
        return sprintf(
            '%s%d%d%d',
            $date->getTimestamp(),
            $passengerCount,
            $id,
            random_int(1, 999)
        );
    }

    private function generateIdNumber(DateTime $date, int $id): string
    {
        return $date->getTimestamp() . $id;
    }

    private function replaceTemplateVariables(string $template, array $data): string
    {
        foreach ($data as $key => $value) {
            $template = str_replace('{{ ' . $key . ' }}', htmlspecialchars($value), $template);
        }
        return $template;
    }
}
