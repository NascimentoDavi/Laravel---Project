<?php

namespace App\Services;
use App\DTOs\CreateSupportDTO;
use App\DTOs\UpdateSupportDTO;
use stdClass;

class SupportService
{
    // Can be viewed by any method inside this call and extensions of it
    protected $repository;

    // repository interface
    public function __construct()
    {

    }

    // It's gonna be configured with a DTO.
    public function new(CreateSupportDTO $dto) : stdClass // return a generic class
    {
        return $this->repository->new($dto);
    }

    public function update(
        UpdateSupportDTO $dto
    ) : stdClass|null
    {
        return $this->repository->update($dto);
    }

    // Recover all the Supports
    public function getAll(string $filter = null) : array
    {
        return $this->repository->getAll($filter);
    }

    // return a StdClass or Null
    public function findOne(string $id) : stdClass | null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string|int $id) : void 
    {
        $this->repository->delete($id);
    }
}