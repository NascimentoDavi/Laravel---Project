<?php

namespace App\Repositories;

use App\DTOs\{ CreateSupportDTO, UpdateSupportDTO};
use App\Repositories\{ SupportRepositoryInterface };
use App\Models\Support;
use stdClass;


class SupportEloquentORM implements SupportRepositoryInterface {

    public function __construct(
        protected Support $model
    ) {}

    public function getAll(string $filter = null) : array {
        return $this->model
            ->where(function ($query) use ($filter) { // use é usado pra utilizar variaveis de escopo externo, como $filter;
                if($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id) : stdClass|null {
        $support = $this->model->find($id);
        if(!$support){
            return null;
        }
        return (object) $support->toArray();
    }

    public function delete(string $id) : void {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto) : stdClass {
        $support = $this->model->create( // O Model Support herda da classe Model do Eloquent os métodos de manipulação de banco de daddos.
            (array) $dto //  É passado como Array por causa de Mass Assignment.
        );
        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto) : stdClass {
        $support = $this->model->find($dto->id);

        if(!$support) { // Se não achar retorna null
            return null;
        } else {
            $support->update(
                (array) $dto
            );
        }

        return (object) $support->toArray();
    }
}