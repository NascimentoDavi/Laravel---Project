<?php

namespace App\DTOs;

use App\Http\Requests\StoreUpdateSupport;

class CreateSupportDTO
{
    public function __construct (
        public string $subject,
        public string $status,
        public string $body,
    ) {}

    public static function makeFromRequest (StoreUpdateSupport $request) : self // Retorna um Objeto da Própria Classe
    {
        return new self(
            $request->subject,
            'a', // default status
            $request->body,
        );
    }
}