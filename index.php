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
use Src\Presentation\Controllers\WebAuthController;
use Src\Presentation\Controllers\WebDashboardController;
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

// Back-End Routes
$router->post('/api/auth/login', [AuthController::class, 'login']);
$router->post('/api/auth/register', [AuthController::class, 'register']);
$router->put('/api/auth/refresh', [AuthController::class, 'refresh']);
$router->delete('/api/auth/logout', [AuthController::class, 'logout'], AuthMiddleware::class);

$router->get('/api/users', [UserController::class, 'index'], AuthMiddleware::class);
$router->get('/api/users/{id}', [UserController::class, 'show'], AuthMiddleware::class);
$router->put('/api/users/{id}', [UserController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/users/{id}', [UserController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/orders', [OrderController::class, 'index'], AuthMiddleware::class);
$router->get('/api/orders/{id}', [OrderController::class, 'show'], AuthMiddleware::class);
$router->post('/api/orders', [OrderController::class, 'store'], AuthMiddleware::class);
$router->put('/api/orders/{id}', [OrderController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/orders/{id}', [OrderController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/payments', [PaymentController::class, 'index'], AuthMiddleware::class);
$router->get('/api/payments/{id}', [PaymentController::class, 'show'], AuthMiddleware::class);
$router->post('/api/payments', [PaymentController::class, 'store'], AuthMiddleware::class);
$router->put('/api/payments/{id}', [PaymentController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/payments/{id}', [PaymentController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/routes', [RouteController::class, 'index'], AuthMiddleware::class);
$router->get('/api/routes/{id}', [RouteController::class, 'show'], AuthMiddleware::class);
$router->post('/api/routes', [RouteController::class, 'store'], AuthMiddleware::class);
$router->put('/api/routes/{id}', [RouteController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/routes/{id}', [RouteController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/seats', [SeatController::class, 'index'], AuthMiddleware::class);
$router->get('/api/seats/{id}', [SeatController::class, 'show'], AuthMiddleware::class);
$router->post('/api/seats', [SeatController::class, 'store'], AuthMiddleware::class);
$router->put('/api/seats/{id}', [SeatController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/seats/{id}', [SeatController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/stations', [StationController::class, 'index'], AuthMiddleware::class);
$router->get('/api/stations/{id}', [StationController::class, 'show'], AuthMiddleware::class);
$router->post('/api/stations', [StationController::class, 'store'], AuthMiddleware::class);
$router->put('/api/stations/{id}', [StationController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/stations/{id}', [StationController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/times', [TimeController::class, 'index'], AuthMiddleware::class);
$router->get('/api/times/{id}', [TimeController::class, 'show'], AuthMiddleware::class);
$router->post('/api/times', [TimeController::class, 'store'], AuthMiddleware::class);
$router->put('/api/times/{id}', [TimeController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/times/{id}', [TimeController::class, 'delete'], AuthMiddleware::class);

$router->get('/api/trains', [TrainController::class, 'index'], AuthMiddleware::class);
$router->get('/api/trains/{id}', [TrainController::class, 'show'], AuthMiddleware::class);
$router->post('/api/trains', [TrainController::class, 'store'], AuthMiddleware::class);
$router->put('/api/trains/{id}', [TrainController::class, 'update'], AuthMiddleware::class);
$router->delete('/api/trains/{id}', [TrainController::class, 'delete'], AuthMiddleware::class);

// Front-End Routes
$router->get('/', [WebHomeController::class, 'index']);

$router->get('/login', [WebAuthController::class, 'indexLogin']);
$router->get('/register', [WebAuthController::class, 'indexRegister']);

$router->get('/dashboard', [WebDashboardController::class, 'index']);

$router->resolve();
