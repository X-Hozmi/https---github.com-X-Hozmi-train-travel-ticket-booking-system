<?php

namespace Src\Application\Middlewares;

use Src\Application\Services\JWTService;
use Src\Application\Services\ResponseService;

class AuthMiddleware
{
    private JWTService $jwtService;

    public function __construct()
    {
        $this->jwtService = new JWTService();
    }

    public function handle(): ?object
    {
        $headers = apache_request_headers();
        $token = $headers['Authorization'] ?? '';

        if (empty($token)) {
            ResponseService::unauthorized('No token provided');
        }

        $token = str_replace('Bearer ', '', $token);

        $payload = $this->jwtService->validateToken($token);

        if (! $payload) {
            ResponseService::unauthorized('Invalid token');
        }

        return $payload;
    }
}
