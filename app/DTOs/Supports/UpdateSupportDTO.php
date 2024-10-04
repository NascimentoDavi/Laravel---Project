<?php

namespace App\DTOs\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct (
        public string $id,
        public string $owner_id,
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ) {}

    /**
     * 
     * @param StoreUpdateSupport $request
     * @return self 
     * 
     */
    public static function makeFromRequest(StoreUpdateSupport $request, string $id = null)
    {
        return new self (
            $id ?? $request->id,
            $request->owner_id,
            $request->subject,
            SupportStatus::o,
            $request->body,
        );
    }
}