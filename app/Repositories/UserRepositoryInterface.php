<?php

namespace App\Repositories;

use App\DTOs\Users\CreateUserDTO;
use App\DTOs\Users\UpdateUserDTO;
use phpDocumentor\Reflection\Types\Boolean;
use stdClass;

interface UserRepositoryInterface
{
    public function create(CreateUserDTO $dto) : stdClass;
    public function update(UpdateUserDTO $dto) : stdClass | null;
    public function findById(string $id) : stdClass | null;
    public function findByEmail(string $email) : stdClass | null;
    public function getAll(string $filter = null) : array;
    public function delete(string $id) : bool;
}