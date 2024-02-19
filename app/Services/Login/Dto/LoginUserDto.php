<?php

namespace App\Services\Login\Dto;

use App\Http\Requests\Message\File\Auth\Login\LoginRequest;

class LoginUserDto
{
    public function __construct(
        public string $login,
        public string $password,

    ) {}
    public static function fromRequest(LoginRequest $request): LoginUserDto
    {
        return new self(
            login: $request->getEmail(),
            password: $request->getPassword()
        );
    }
}
