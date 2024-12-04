<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\UserRepositoryImpl;
use Src\Application\Services\JWTService;
use Src\Application\Services\ResponseService;
use Src\Domain\Entities\User;
use Src\Domain\UseCases\AuthUseCase;

class AuthController
{
    private AuthUseCase $authUseCase;

    public function __construct()
    {
        $userRepository = new UserRepositoryImpl();
        $jwtService = new JWTService();
        $this->authUseCase = new AuthUseCase($userRepository, $jwtService);
    }

    public function login()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            if (! isset($data['username']) || ! isset($data['password'])) {
                throw new \Exception('Username and password are required');
            }

            $result = $this->authUseCase->login($data['username'], $data['password']);

            ResponseService::success($result);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function register()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            if (
                ! isset($data['username']) || ! isset($data['password']) ||
                ! isset($data['email']) || ! isset($data['name']) ||
                ! isset($data['id_number']) || ! isset($data['address']) ||
                ! isset($data['phone_number'])
            ) {
                throw new \Exception('Missing required fields');
            }

            $user = new User();
            $user->idNumber = $data['id_number'];
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->username = $data['username'];
            $user->phoneNumber = $data['phone_number'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->role = $data['role'] ?? 'client';

            $this->authUseCase->register($user);

            ResponseService::created([], 'Successfully registered');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function refresh()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            if (! isset($data['refresh_token'])) {
                throw new \Exception('Refresh token is required');
            }

            $result = $this->authUseCase->refreshToken($data['refresh_token']);

            ResponseService::success($result, 'Refresh token return successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function logout()
    {
        try {
            $headers = apache_request_headers();
            $token = $headers['Authorization'];
            $token = str_replace('Bearer ', '', $token);

            $this->authUseCase->logout($token);

            ResponseService::success([], 'Successfully logged out');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
