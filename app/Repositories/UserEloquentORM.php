<?php

namespace App\Repositories;

use App\DTOs\Users\CreateUserDTO;
use App\DTOs\Users\UpdateUserDTO;
use App\Models\User;
use stdClass;

class UserEloquentORM implements UserRepositoryInterface
{
    public function __construct(
        protected User $model
    )
    {}

    public function create (CreateUserDTO $dto) : stdClass {
        $user = $this->model->create(
            (array) $dto
        );
        return (object) $user->toArray();
    }

    public function update (UpdateUserDTO $dto) : stdClass | null {
        $user = $this->model->findByID($dto->id);
        if(!$user) {
            return null;
        } else {
            $user->update(
                (array) $dto
            );
        }
        return (object) $user->toArray();
    }

    public function getAll(string $filter = null) : array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    public function findByID (string $id) : stdClass | null {
        $user = $this->model->find($id);
        if(!$user) {
            return null;
        } else {
            return (object) $user->toArray();
        }
    }

    public function findByEmail (string $email) : stdClass | null {
        $user = $this->model->findByEmail;
        if(!$user){
            return null;
        } else {
            return (object) $user->toArray();
        }
    }

    public function delete(string $id) : bool
    {
        $user = $this->model->findByID($id);
        if(!$user){
            return false;
        } else {
            return true;
        }
    }
}