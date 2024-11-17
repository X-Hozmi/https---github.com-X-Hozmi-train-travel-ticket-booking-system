<?php

namespace Src\Domain\UseCases;

use Src\Domain\Entities\User;
use Src\Domain\Repositories\UserRepositoryInterface;

class UserUseCase
{
    private UserRepositoryInterface $orderRepository;

    public function __construct(UserRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllUsers(): array
    {
        return $this->orderRepository->show();
    }

    public function getUserById(int $id): ?User
    {
        return $this->orderRepository->findById($id);
    }

    public function updateUser(User $order): User
    {
        return $this->orderRepository->update($order);
    }

    public function deleteUser(int $id): bool
    {
        return $this->orderRepository->delete($id);
    }
}
