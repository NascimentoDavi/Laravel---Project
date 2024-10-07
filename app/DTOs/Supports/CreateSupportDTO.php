<?php

namespace App\DTOs\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;

class CreateSupportDTO
{
    public function __construct (
        public string $subject,
        public SupportStatus $status,
        public string $body,
        public int $user_id
    ) {}

    /**
     * 
     * @param StoreUpdateSupport $request
     * @return self
     * 
     */
    public static function makeFromRequest (StoreUpdateSupport $request) : self
    {
        return new self (
            $request->subject,
            SupportStatus::o,
            $request->body,
            $request->user()->id,
        );
    }
}