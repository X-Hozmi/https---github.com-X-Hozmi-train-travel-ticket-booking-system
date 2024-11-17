<?php

namespace Src\Application\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTService
{
    private string $key;
    private string $refreshKey;
    private string $algorithm;
    private int $accessTokenExpiration;
    private int $refreshTokenExpiration;

    public function __construct()
    {
        $this->key = $_ENV['ACCESS_TOKEN_SECRET'] ?? 'your-secret-key';
        $this->refreshKey = $_ENV['REFRESH_TOKEN_SECRET'] ?? 'your-refresh-secret-key';
        $this->algorithm = 'HS256';
        $this->accessTokenExpiration = 3600;
        $this->refreshTokenExpiration = 2592000;
    }

    public function generateToken(array $payload): string
    {
        $issuedAt = time();
        $expire = $issuedAt + $this->accessTokenExpiration;

        $tokenPayload = array_merge(
            $payload,
            [
                'iat' => $issuedAt,
                'exp' => $expire,
                'type' => 'access',
            ]
        );

        return JWT::encode($tokenPayload, $this->key, $this->algorithm);
    }

    public function generateRefreshToken(array $payload): string
    {
        $issuedAt = time();
        $expire = $issuedAt + $this->refreshTokenExpiration;

        $tokenPayload = array_merge(
            $payload,
            [
                'iat' => $issuedAt,
                'exp' => $expire,
                'type' => 'refresh',
            ]
        );

        return JWT::encode($tokenPayload, $this->refreshKey, $this->algorithm);
    }

    public function validateToken(string $token): ?object
    {
        try {
            return JWT::decode($token, new Key($this->key, $this->algorithm));
        } catch (\Exception $e) {
            return null;
        }
    }

    public function verifyToken(string $token): ?object
    {
        $payload = $this->validateToken($token);

        if (! $payload || ! isset($payload->type) || $payload->type !== 'access') {
            return null;
        }

        return $payload;
    }

    public function verifyRefreshToken(string $token): ?object
    {
        try {
            $payload = JWT::decode($token, new Key($this->refreshKey, $this->algorithm));

            if (! isset($payload->type) || $payload->type !== 'refresh') {
                return null;
            }

            return $payload;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getPayloadFromToken(string $token): ?object
    {
        return $this->validateToken($token);
    }
}
