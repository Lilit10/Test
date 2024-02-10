<?php

namespace App\Services\Register\Dto;

use App\Http\Requests\Auth\Register\RegisterRequest;

class RegisterDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return new self(
            name: $request->getName(),
            email: $request->getEmail(),
            password: $request->getPassword(),
        );
    }
}
