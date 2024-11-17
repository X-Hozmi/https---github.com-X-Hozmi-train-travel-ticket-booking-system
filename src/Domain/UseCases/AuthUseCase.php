<?php

namespace Src\Domain\UseCases;

use Src\Application\Services\JWTService;
use Src\Domain\Entities\User;
use Src\Domain\Repositories\UserRepositoryInterface;

class AuthUseCase
{
    private UserRepositoryInterface $userRepository;
    private JWTService $jwtService;

    public function __construct(UserRepositoryInterface $userRepository, JWTService $jwtService)
    {
        $this->userRepository = $userRepository;
        $this->jwtService = $jwtService;
    }

    public function login(string $username, string $password): array
    {
        $user = $this->userRepository->login($username, $password);

        if (! $user) {
            throw new \Exception('Invalid credentials');
        }

        $accessToken = $this->jwtService->generateToken([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
        ]);

        $refreshToken = $this->jwtService->generateRefreshToken([
            'user_id' => $user['id'],
        ]);

        $this->userRepository->storeRefreshToken($user['id'], $refreshToken);

        return [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
            ],
        ];
    }

    public function register(User $user): void
    {
        $existingUser = $this->userRepository->findByEmail($user->email);

        if ($existingUser) {
            throw new \Exception('Email already exists');
        }

        $this->userRepository->save($user);
    }

    public function refreshToken(string $refreshToken): array
    {
        $payload = $this->jwtService->verifyRefreshToken($refreshToken);
        if (! $payload) {
            throw new \Exception('Invalid refresh token');
        }

        $user = $this->userRepository->findById($payload->user_id);
        if (! $user) {
            throw new \Exception('User not found');
        }

        if (! $this->userRepository->verifyRefreshToken($user->id, $refreshToken)) {
            throw new \Exception('Invalid refresh token');
        }

        $newAccessToken = $this->jwtService->generateToken([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
        ]);

        return [
            'access_token' => $newAccessToken,
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ],
        ];
    }

    public function logout(string $token): void
    {
        $payload = $this->jwtService->verifyToken($token);
        if (! $payload) {
            throw new \Exception('Invalid token');
        }

        $this->userRepository->removeRefreshToken($payload->user_id);
    }
}
