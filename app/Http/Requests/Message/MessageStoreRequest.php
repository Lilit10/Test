<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MessageStoreRequest extends FormRequest
{
    private const USER_ID = 'user_id';
    private const CHAT_ID = 'chat_id';
    private const CONTENT = 'content';
    private const FILE_ID = 'file_id';

    public function rules()
    {
        return [
            self::USER_ID => 'required|exists:users,id',
            self::CHAT_ID => 'required|exists:chats,id',
            self::CONTENT => [
                Rule::requiredIf(function () {
                    return is_null($this->input(self::FILE_ID));
                }),
                'string',
            ],
            self::FILE_ID => [
                Rule::requiredIf(function () {
                    return is_null($this->input(self::CONTENT));
                }),
                'int',
            ],
        ];
    }

    public function getUserId()
    {
        return $this->input(self::USER_ID);
    }

    public function getChatId()
    {
        return $this->input(self::CHAT_ID);
    }

    public function getMessageContent()
    {
        return $this->input(self::CONTENT);
    }

    public function getFileId()
    {
        return (int) $this->input(self::FILE_ID);
    }
}
