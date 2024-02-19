<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatRequest extends FormRequest
{
    const NAME = 'name';
    const IS_GROUP = 'is_group';
    const AVATAR = 'avatar';
    const USER_IDS = 'user_ids';


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

            self::USER_IDS => [
                'required',
                'array',
                'min:1',
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

    public function getAvatar(): ?string
    {
        return $this->get(self::AVATAR);
    }

    public function getUserIds(): array
    {
        return $this->get(self::USER_IDS, []);
    }
}
