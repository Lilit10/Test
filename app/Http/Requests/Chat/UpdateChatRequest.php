<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatRequest extends FormRequest
{
    const NAME = 'name';
    const IS_GROUP = 'is_group';
    const AVATAR = 'avatar';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],

            self::IS_GROUP => [
                'required',
                'boolean',
            ],

            self::AVATAR => [
                'nullable',
                'string',
            ],
        ];
    }

    public function getName(): string
    {
        return  $this->get(self::NAME);
    }

    public function getIsGroup(): bool
    {
        return $this->get(self::IS_GROUP);
    }

    public function getAvatar(): string
    {
        return $this->get(self::AVATAR);
    }
}
