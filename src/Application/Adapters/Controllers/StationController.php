<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\StationRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Station;
use Src\Domain\UseCases\StationUseCase;

class StationController
{
    private StationUseCase $stationUseCase;

    public function __construct()
    {
        $stationRepository = new StationRepositoryImpl();
        $this->stationUseCase = new StationUseCase($stationRepository);
    }

    public function index()
    {
        try {
            $stations = $this->stationUseCase->getAllStations();

            ResponseService::success($stations);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $station = $this->stationUseCase->getStationById($id);

            if (! $station) {
                throw new \Exception('Station not found');
            }

            ResponseService::success($station);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $station = new Station();
            $station->code = $data['code'];
            $station->name = $data['name'];
            $station->city = $data['city'];
            $station->cityName = $data['cityname'];

            $result = $this->stationUseCase->createStation($station);

            ResponseService::created($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $station = $this->stationUseCase->getStationById($id);
            if (! $station) {
                throw new \Exception('Station not found');
            }

            $station->code = $data['code'] ?? $station->code;
            $station->name = $data['name'] ?? $station->name;
            $station->city = $data['city'] ?? $station->city;
            $station->cityName = $data['cityname'] ?? $station->cityName;

            $result = $this->stationUseCase->updateStation($station);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->stationUseCase->deleteStation($id);

            if (! $result) {
                throw new \Exception('Failed to delete station');
            }

            ResponseService::success($result, $message = 'Station deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
