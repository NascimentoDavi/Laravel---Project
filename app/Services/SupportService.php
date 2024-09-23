<?php

namespace App\Services;

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
    public function new(
        string $subject,
        string $status,
        string $body
    ) : stdClass // return a generic class
    {
        return $this->repository->new(
            $subject,
            $status,
            $body
        );
    }

    public function update(
        string|int $id,
        string $subject,
        string $status,
        string $body
    ) : stdClass
    {
        return $this->repository->update
        (
            $id,
            $subject,
            $status,
            $body
        );
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