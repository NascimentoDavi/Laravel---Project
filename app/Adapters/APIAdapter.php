<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\PaginationInterface;

class APIAdapter {
    public static function toJSON(PaginationInterface $data)
    {
        return DefaultResource::collection($data->items())
        ->additional([ // Additional is used to attach extra data into a resource response.
            'meta' => [
                    'total' => $data->totalItems(),
                    'is_first_page' => $data->isFirstPage(),
                    'is_last_page' => $data->isLastPage(),
                    'current_page' => $data->currentPage(),
                    'next_page' => $data->nextPage(),
                    'previous_page' => $data->previousPage(),
            ]
        ]);
    }
}