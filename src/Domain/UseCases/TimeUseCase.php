<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Time;
use Src\Domain\Repositories\TimeRepositoryInterface;

class TimeUseCase
{
    private TimeRepositoryInterface $routeRepository;

    public function __construct(TimeRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function getAllTimes(): array
    {
        return $this->routeRepository->show();
    }

    public function getTimeById(int $id): ?Time
    {
        return $this->routeRepository->findById($id);
    }

    public function createTime(Time $time): bool
    {
        return $this->routeRepository->save($time);
    }

    public function updateTime(Time $time): bool
    {
        return $this->routeRepository->update($time);
    }

    public function deleteTime(int $id): bool
    {
        return $this->routeRepository->delete($id);
    }
}
