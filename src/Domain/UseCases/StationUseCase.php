<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Station;
use Src\Domain\Repositories\StationRepositoryInterface;

class StationUseCase
{
    private StationRepositoryInterface $routeRepository;

    public function __construct(StationRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function getAllStations(): array
    {
        return $this->routeRepository->show();
    }

    public function getStationById(int $id): ?Station
    {
        return $this->routeRepository->findById($id);
    }

    public function createStation(Station $station): bool
    {
        return $this->routeRepository->save($station);
    }

    public function updateStation(Station $station): bool
    {
        return $this->routeRepository->update($station);
    }

    public function deleteStation(int $id): bool
    {
        return $this->routeRepository->delete($id);
    }
}
