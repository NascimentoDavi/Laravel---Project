<?php

/**
 * 
 * Its necessary when using APIs.
 * 
 */

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identify' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
