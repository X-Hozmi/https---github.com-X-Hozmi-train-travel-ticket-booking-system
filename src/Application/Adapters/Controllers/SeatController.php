<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\SeatRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Seat;
use Src\Domain\UseCases\SeatUseCase;

class SeatController
{
    private SeatUseCase $seatUseCase;

    public function __construct()
    {
        $seatRepository = new SeatRepositoryImpl();
        $this->seatUseCase = new SeatUseCase($seatRepository);
    }

    public function index()
    {
        try {
            $seats = $this->seatUseCase->getAllSeats();

            ResponseService::success($seats);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $seat = $this->seatUseCase->getSeatById($id);

            if (! $seat) {
                throw new \Exception('Seat not found');
            }

            ResponseService::success($seat);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $seat = new Seat();
            $seat->trainId = $data['train_id'];
            $seat->carriageNumber = $data['carriage_number'];
            $seat->seatNumber = $data['seat_number'];
            $seat->seatType = $data['seat_type'];
            $seat->isAvailable = $data['is_available'] ?? 1;

            $result = $this->seatUseCase->createSeat($seat);

            ResponseService::created($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $seat = $this->seatUseCase->getSeatById($id);
            if (! $seat) {
                throw new \Exception('Seat not found');
            }

            $seat->trainId = $data['train_id'] ?? $seat->trainId;
            $seat->carriageNumber = $data['carriage_number'] ?? $seat->carriageNumber;
            $seat->seatNumber = $data['seat_number'] ?? $seat->seatNumber;
            $seat->seatType = $data['seat_type'] ?? $seat->seatType;
            $seat->isAvailable = $data['is_available'] ?? $seat->isAvailable;

            $result = $this->seatUseCase->updateSeat($seat);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->seatUseCase->deleteSeat($id);

            if (! $result) {
                throw new \Exception('Failed to delete seat');
            }

            ResponseService::success($result, $message = 'Seat deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
