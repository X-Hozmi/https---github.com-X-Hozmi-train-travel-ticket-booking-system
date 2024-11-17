<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\TrainRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Train;
use Src\Domain\UseCases\TrainUseCase;

class TrainController
{
    private TrainUseCase $trainUseCase;

    public function __construct()
    {
        $trainRepository = new TrainRepositoryImpl();
        $this->trainUseCase = new TrainUseCase($trainRepository);
    }

    public function index()
    {
        try {
            $trains = $this->trainUseCase->getAllTrains();

            ResponseService::success($trains);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $train = $this->trainUseCase->getTrainById($id);

            if (! $train) {
                throw new \Exception('Train not found');
            }

            ResponseService::success($train);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $train = new Train();
            $train->routeId = $data['route_id'];
            $train->timeId = $data['time_id'];
            $train->name = $data['name'];
            $train->class = $data['class'];
            $train->capacity = $data['capacity'];
            $train->carriages = $data['carriages'];
            $train->price = $data['price'];
            $train->status = $data['status'] ?? 'active';

            $result = $this->trainUseCase->createTrain($train);

            ResponseService::created($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $train = $this->trainUseCase->getTrainById($id);
            if (! $train) {
                throw new \Exception('Train not found');
            }

            $train->routeId = $data['route_id'] ?? $train->routeId;
            $train->timeId = $data['time_id'] ?? $train->timeId;
            $train->name = $data['name'] ?? $train->name;
            $train->class = $data['class'] ?? $train->class;
            $train->capacity = $data['capacity'] ?? $train->capacity;
            $train->carriages = $data['carriages'] ?? $train->carriages;
            $train->price = $data['price'] ?? $train->price;
            $train->status = $data['status'] ?? $train->status;

            $result = $this->trainUseCase->updateTrain($train);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->trainUseCase->deleteTrain($id);

            if (! $result) {
                throw new \Exception('Failed to delete train');
            }

            ResponseService::success($result, $message = 'Train deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
