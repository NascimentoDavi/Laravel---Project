<?php

namespace App\Services;
use App\DTOs\Users\CreateUserDTO;
use App\DTOs\Users\UpdateUserDTO;
use App\Repositories\UserRepositoryInterface;
use stdClass;

class SupportService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {}

    public function create (CreateUserDTO $dto) : stdClass
    {
        return $this->repository->create($dto);
    }

    public function update (UpdateUserDTO $dto) : stdClass | null
    {
        return $this->repository->update($dto);
    }

    // Default value = null
    public function getAll (string $filter = null) : array
    {
        return $this->repository->getAll($filter);      
    }

    public function delete (string $id) : bool
    {
        return $this->repository->delete($id);
    }

    public function findById (string $id) : stdClass | null
    {
        return $this->repository->findById($id);
    }

    public function findByEmail (string $email) : stdClass | null
    {
        return $this->repository->findByEmail($email);    
    }
}