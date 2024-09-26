<?php

namespace App\Repositories;

// Métodos que estarei utilizando para trabalhar com paginação

interface PaginationInterface
{

    /**
     * @return stdClass[]
     */
    public function items() : array;
    public function totalItems() : int;
    public function isFirstPage(): bool;
    public function isLastPage(): bool;
    public function currentPage() : int;
    public function nextPage() : int;
    public function previousPage() : int;
}