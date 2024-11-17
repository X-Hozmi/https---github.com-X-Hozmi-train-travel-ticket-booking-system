<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Seat;
use Src\Domain\Repositories\SeatRepositoryInterface;

class SeatUseCase
{
    private SeatRepositoryInterface $routeRepository;

    public function __construct(SeatRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function getAllSeats(): array
    {
        return $this->routeRepository->show();
    }

    public function getSeatById(int $id): ?Seat
    {
        return $this->routeRepository->findById($id);
    }

    public function createSeat(Seat $seat): Seat
    {
        return $this->routeRepository->save($seat);
    }

    public function updateSeat(Seat $seat): Seat
    {
        return $this->routeRepository->update($seat);
    }

    public function deleteSeat(int $id): bool
    {
        return $this->routeRepository->delete($id);
    }
}
