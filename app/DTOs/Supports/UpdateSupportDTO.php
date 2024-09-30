<?php

namespace App\DTOs\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct (
        public string $id,
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreUpdateSupport $request, string $id = null) // ID is passed here to avoid pass through the request body
    {
        return new self (
            $id ?? $request->id,
            $request->subject,
            SupportStatus::o,
            $request->body,
        );
    }
}