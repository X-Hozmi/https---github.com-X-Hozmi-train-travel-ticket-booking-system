<?php

namespace Src\Application\Services;

class ResponseService
{
    public static function success($data = null, string $message = 'Success', int $statusCode = 200): void
    {
        $response = [
            'status' => 'success',
            'message' => $message,
        ];

        if (! empty($data)) {
            $response['data'] = $data;
        }

        http_response_code($statusCode);
        echo json_encode($response);
        exit;
    }

    public static function error(string $message = 'An error occurred', int $statusCode = 400): void
    {
        http_response_code($statusCode);
        echo json_encode([
            'status' => 'error',
            'message' => $message,
        ]);
        exit;
    }

    public static function created($data = null, string $message = 'Resource created successfully'): void
    {
        self::success($data, $message, 201);
    }

    public static function notFound(string $message = 'Resource not found'): void
    {
        self::error($message, 404);
    }

    public static function unauthorized(string $message = 'Unauthorized'): void
    {
        self::error($message, 401);
    }

    public static function forbidden(string $message = 'Forbidden'): void
    {
        self::error($message, 403);
    }

    public static function internalServerError(string $message = 'Internal Server Error'): void
    {
        self::error($message, 500);
    }

    public static function validationError(array $errors): void
    {
        http_response_code(422);
        echo json_encode([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $errors,
        ]);
        exit;
    }
}
