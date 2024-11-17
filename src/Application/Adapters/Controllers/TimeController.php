<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\TimeRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Time;
use Src\Domain\UseCases\TimeUseCase;

class TimeController
{
    private TimeUseCase $timeUseCase;

    public function __construct()
    {
        $timeRepository = new TimeRepositoryImpl();
        $this->timeUseCase = new TimeUseCase($timeRepository);
    }

    public function index()
    {
        try {
            $times = $this->timeUseCase->getAllTimes();

            ResponseService::success($times);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $time = $this->timeUseCase->getTimeById($id);

            if (! $time) {
                throw new \Exception('Time not found');
            }

            ResponseService::success($time);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $time = new Time();
            $time->arrival = $data['arrival'];
            $time->departure = $data['departure'];

            $result = $this->timeUseCase->createTime($time);

            ResponseService::created($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $time = $this->timeUseCase->getTimeById($id);
            if (! $time) {
                throw new \Exception('Time not found');
            }

            $time->arrival = $data['arrival'] ?? $time->arrival;
            $time->departure = $data['departure'] ?? $time->departure;

            $result = $this->timeUseCase->updateTime($time);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->timeUseCase->deleteTime($id);

            if (! $result) {
                throw new \Exception('Failed to delete time');
            }

            ResponseService::success($result, $message = 'Time deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
