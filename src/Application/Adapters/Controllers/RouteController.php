<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\RouteRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\Route;
use Src\Domain\UseCases\RouteUseCase;

class RouteController
{
    private RouteUseCase $routeUseCase;

    public function __construct()
    {
        $routeRepository = new RouteRepositoryImpl();
        $this->routeUseCase = new RouteUseCase($routeRepository);
    }

    public function index()
    {
        try {
            $routes = $this->routeUseCase->getAllRoutes();

            ResponseService::success($routes);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $route = $this->routeUseCase->getRouteById($id);

            if (! $route) {
                throw new \Exception('Route not found');
            }

            ResponseService::success($route);
        } catch (\Exception $e) {
            ResponseService::notFound($e->getMessage());
        }
    }

    public function checkRoute()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $result = $this->routeUseCase->checkRoute($data);

            if ((bool) $result['status']) {
                ResponseService::success($result['data'], $result['message']);
            } else {
                ResponseService::error($result['message']);
            }
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $route = new Route();
            $route->source = $data['source'];
            $route->destination = $data['destination'];

            $result = $this->routeUseCase->createRoute($route);

            ResponseService::created($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $route = $this->routeUseCase->getRouteById($id);
            if (! $route) {
                throw new \Exception('Route not found');
            }

            $route->source = $data['source'] ?? $route->source;
            $route->destination = $data['destination'] ?? $route->destination;

            $result = $this->routeUseCase->updateRoute($route);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->routeUseCase->deleteRoute($id);

            if (! $result) {
                throw new \Exception('Failed to delete route');
            }

            ResponseService::success($result, $message = 'Route deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
