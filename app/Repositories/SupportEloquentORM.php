<?php

namespace App\Repositories;

use App\DTOs\Supports\{ CreateSupportDTO, UpdateSupportDTO};
use App\Repositories\{ SupportRepositoryInterface };
use App\Repositories\{ PaginationInterface };
use App\Models\Support;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface {

    public function __construct(
        protected Support $model
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 15, ?string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->where(function ($query) use ($filter) { // 'use' é usado pra utilizar variaveis de escopo externo, como $filter;
                if($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPerPage, ['*'], 'page', $page); // Não podemos usar all() porque ele nao aceita filtros nem condições
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null) : array {
        return $this->model
            ->where(function ($query) use ($filter) { // 'use' é usado pra utilizar variaveis de escopo externo, como $filter;
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

    // A instância criada é na verdade validada antes de ser adicionada.
    public function new(CreateSupportDTO $dto) : stdClass {
        $support = $this->model->create(
            (array) $dto //  É passado como Array por causa de Mass Assignment.
        );
        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto) : stdClass {
        $support = $this->model->find($dto->id);
        if(!$support) {
            return null;
        } else {
            $support->update(
                (array) $dto
            );
        }
        return (object) $support->toArray();
    }
}