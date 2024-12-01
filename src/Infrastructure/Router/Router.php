<?php

namespace Src\Infrastructure\Router;

use Src\Application\Services\ResponseService;

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler, ?string $middleware = null): void
    {
        $this->addRoute('GET', $path, $handler, $middleware);
    }

    public function post(string $path, array $handler, ?string $middleware = null): void
    {
        $this->addRoute('POST', $path, $handler, $middleware);
    }

    public function put(string $path, array $handler, ?string $middleware = null): void
    {
        $this->addRoute('PUT', $path, $handler, $middleware);
    }

    public function delete(string $path, array $handler, ?string $middleware = null): void
    {
        $this->addRoute('DELETE', $path, $handler, $middleware);
    }

    private function addRoute(string $method, string $path, array $handler, ?string $middleware): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function resolve(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $projectPath = '/travel-ticket';
        if (strpos($path, $projectPath) === 0) {
            $path = substr($path, strlen($projectPath));
        }

        error_log('Requested Method: ' . $method);
        error_log('Requested Path: ' . $path);

        $isApiRoute = strpos($path, '/api/') === 0;

        if ($isApiRoute) {
            header('Content-Type: application/json');
        } else {
            header('Content-Type: text/html; charset=UTF-8');
        }

        foreach ($this->routes as $route) {
            $pattern = $this->convertPathToRegex($route['path']);
            error_log('Checking Route: ' . $route['path'] . ' with pattern: ' . $pattern);

            if ($route['method'] === $method && preg_match($pattern, $path, $matches)) {
                error_log('Route matched!');
                array_shift($matches);

                if ($route['middleware']) {
                    $middlewareClass = new $route['middleware']();
                    $middlewareResult = $middlewareClass->handle();
                    if ($middlewareResult === false) {
                        return;
                    }
                }

                try {
                    $controller = new $route['handler'][0]();
                    $method = $route['handler'][1];
                    $controller->$method(...$matches);
                    return;
                } catch (\Throwable $e) {
                    error_log('Error executing controller: ' . $e->getMessage());
                    if ($isApiRoute) {
                        ResponseService::internalServerError($e->getMessage());
                    } else {
                        echo '<h1>Error</h1>';
                        echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
                    }
                }
            }
        }

        error_log('No matching route found');
        if ($isApiRoute) {
            ResponseService::notFound('No matching route found');
        } else {
            header('HTTP/1.0 404 Not Found');
            echo '<h1>404 Page Not Found</h1>';
        }
    }

    private function convertPathToRegex(string $path): string
    {
        return '#^' . preg_replace('#\{([a-zA-Z0-9_]+)\}#', '([^/]+)', $path) . '$#';
    }
}
