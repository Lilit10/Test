<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class ChatShowRequest extends FormRequest
{
    const USER_ID = 'user_id';

    public function rules(): array
    {
        return [
            self::USER_ID => 'required|exists:users,id',
        ];
    }

    public function getUserId(): int
    {
        return $this->get(self::USER_ID);
    }
}
