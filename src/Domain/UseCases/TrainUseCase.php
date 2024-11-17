<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Train;
use Src\Domain\Repositories\TrainRepositoryInterface;

class TrainUseCase
{
    private TrainRepositoryInterface $trainRepository;

    public function __construct(TrainRepositoryInterface $trainRepository)
    {
        $this->trainRepository = $trainRepository;
    }

    public function getAllTrains(): array
    {
        return $this->trainRepository->show();
    }

    public function getTrainById(int $id): ?Train
    {
        return $this->trainRepository->findById($id);
    }

    public function createTrain(Train $train): Train
    {
        return $this->trainRepository->save($train);
    }

    public function updateTrain(Train $train): Train
    {
        return $this->trainRepository->update($train);
    }

    public function deleteTrain(int $id): bool
    {
        return $this->trainRepository->delete($id);
    }
}
