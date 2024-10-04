<?php

namespace App\DTOs\Users;

use App\Http\Requests\ProfileUpdateRequest;
    
class CreateUserDTO
{
    // Concise - DTO Attributes inside the constructor
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    /**
     * 
     * Create a DTO from a request
     * 
     * @param ProfileUpdateRequest $request
     * @return self // return an instance of the same class
     * 
     */
    public static function makeFromRequest(ProfileUpdateRequest $request)
    {
        return new self (
            $request->name,
            $request->email,
            bcrypt($request->password)
        );
    }
}
