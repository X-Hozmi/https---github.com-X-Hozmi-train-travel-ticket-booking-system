<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Src\Application\Adapters\Controllers\AuthController;
use Src\Application\Adapters\Controllers\OrderController;
use Src\Application\Adapters\Controllers\PaymentController;
use Src\Application\Adapters\Controllers\RouteController;
use Src\Application\Adapters\Controllers\SeatController;
use Src\Application\Adapters\Controllers\StationController;
use Src\Application\Adapters\Controllers\TimeController;
use Src\Application\Adapters\Controllers\TrainController;
use Src\Application\Adapters\Controllers\UserController;
use Src\Application\Middlewares\AuthMiddleware;
use Src\Infrastructure\Router\Router;
use Src\Presentation\Controllers\WebHomeController;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$router = new Router();
$uri = '';

// Back-End Routes
$router->post($uri . '/api/auth/login', [AuthController::class, 'login']);
$router->post($uri . '/api/auth/register', [AuthController::class, 'register']);
$router->put($uri . '/api/auth/refresh', [AuthController::class, 'refresh']);
$router->delete($uri . '/api/auth/logout', [AuthController::class, 'logout'], AuthMiddleware::class);

$router->get($uri . '/api/users', [UserController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/users/{id}', [UserController::class, 'show'], AuthMiddleware::class);
$router->put($uri . '/api/users/{id}', [UserController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/users/{id}', [UserController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/orders', [OrderController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/orders/{id}', [OrderController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/orders', [OrderController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/orders/{id}', [OrderController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/orders/{id}', [OrderController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/payments', [PaymentController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/payments/{id}', [PaymentController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/payments', [PaymentController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/payments/{id}', [PaymentController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/payments/{id}', [PaymentController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/routes', [RouteController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/routes/{id}', [RouteController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/routes', [RouteController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/routes/{id}', [RouteController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/routes/{id}', [RouteController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/seats', [SeatController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/seats/{id}', [SeatController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/seats', [SeatController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/seats/{id}', [SeatController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/seats/{id}', [SeatController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/stations', [StationController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/stations/{id}', [StationController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/stations', [StationController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/stations/{id}', [StationController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/stations/{id}', [StationController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/times', [TimeController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/times/{id}', [TimeController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/times', [TimeController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/times/{id}', [TimeController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/times/{id}', [TimeController::class, 'delete'], AuthMiddleware::class);

$router->get($uri . '/api/trains', [TrainController::class, 'index'], AuthMiddleware::class);
$router->get($uri . '/api/trains/{id}', [TrainController::class, 'show'], AuthMiddleware::class);
$router->post($uri . '/api/trains', [TrainController::class, 'store'], AuthMiddleware::class);
$router->put($uri . '/api/trains/{id}', [TrainController::class, 'update'], AuthMiddleware::class);
$router->delete($uri . '/api/trains/{id}', [TrainController::class, 'delete'], AuthMiddleware::class);

// Front-End Routes
$router->get($uri . '/', [WebHomeController::class, 'index']);

$router->resolve();
