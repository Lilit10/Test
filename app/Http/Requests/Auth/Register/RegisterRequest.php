<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],
            self::EMAIL => [
                'required',
                'email',
                'unique:users',
                'string',
            ],
            self::PASSWORD => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }

    public function getName(): string
    {
        return $this->input(self::NAME);
    }


    public function getEmail(): string
    {
        return $this->input(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->input(self::PASSWORD);
    }
}
