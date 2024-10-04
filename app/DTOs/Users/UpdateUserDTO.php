<?php

namespace App\DTOs\Users;

use App\Http\Requests\ProfileUpdateRequest;

class UpdateUserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public ?string $password = null // Senha is optional
    )
    {}

    /**
     * 
     * @param ProfileUpdateRequest $request
     * @return self
     * 
     */
    public static function makeFromRequest(ProfileUpdateRequest $request)
    {
        return new self (
            $id ?? $request->id,
            $request->name,
            $request->email,
            $request->filled('password') ? bcrypt($request->password) : null // Hash the password only if provided
        );
    }

}