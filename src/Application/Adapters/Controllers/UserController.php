<?php

namespace Src\Application\Adapters\Controllers;

use Src\Application\Adapters\Repositories\UserRepositoryImpl;
use Src\Application\Services\ResponseService;
use Src\Domain\UseCases\UserUseCase;

class UserController
{
    private UserUseCase $userUseCase;

    public function __construct()
    {
        $userRepository = new UserRepositoryImpl();
        $this->userUseCase = new UserUseCase($userRepository);
    }

    public function index()
    {
        try {
            $users = $this->userUseCase->getAllUsers();

            ResponseService::success(['user' => $users]);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $user = $this->userUseCase->getUserById($id);

            if (! $user) {
                ResponseService::notFound('User not found');
            }

            ResponseService::success($user);
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function update(int $id)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            $user = $this->userUseCase->getUserById($id);
            if (! $user) {
                ResponseService::notFound('User not found');
            }

            $password = $data['password'] ?? $user->password;

            $user->idNumber = $data['id_number'] ?? $user->idNumber;
            $user->name = $data['name'] ?? $user->name;
            $user->email = $data['email'] ?? $user->email;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            ;
            $user->role = $data['role'] ?? $user->role;

            $result = $this->userUseCase->updateUser($user);

            ResponseService::success([], 'Update Success');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->userUseCase->deleteUser($id);

            if (! $result) {
                ResponseService::internalServerError('Failed to delete user');
            }

            ResponseService::success([], 'User deleted successfully');
        } catch (\Exception $e) {
            ResponseService::error($e->getMessage());
        }
    }
}
