<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\Route;
use Src\Domain\Repositories\RouteRepositoryInterface;

class RouteUseCase
{
    private RouteRepositoryInterface $routeRepository;

    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function getAllRoutes(): array
    {
        return $this->routeRepository->show();
    }

    public function getRouteById(int $id): ?Route
    {
        return $this->routeRepository->findById($id);
    }

    public function createRoute(Route $route): bool
    {
        return $this->routeRepository->save($route);
    }

    public function updateRoute(Route $route): bool
    {
        return $this->routeRepository->update($route);
    }

    public function deleteRoute(int $id): bool
    {
        return $this->routeRepository->delete($id);
    }
}
