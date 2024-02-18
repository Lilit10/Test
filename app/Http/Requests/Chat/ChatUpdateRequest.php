<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChatUpdateRequest extends FormRequest
{
    const USER_ID = 'user_id';
    const NAME = 'name';
    const IS_GROUP = 'is_group';
    const AVATAR = 'avatar';

    public function rules(): array
    {
        return [
            self::USER_ID => [
                'required',
                'exists:users,id',
            ],
            self::NAME => [
                'string',
            ],

            self::IS_GROUP => [
                'boolean',
            ],
            self::AVATAR => [
                'nullable',
                'image',
            ],
        ];
    }

    public function getUserId(): int
    {
        return $this->get(self::USER_ID);
    }

    public function getName(): string
    {
        return  $this->get(self::NAME);
    }

    public function getIsGroup(): string
    {
        return $this->get(self::IS_GROUP);
    }

    public function getAvatar(): string
    {
        return $this->get(self::AVATAR);
    }
}
