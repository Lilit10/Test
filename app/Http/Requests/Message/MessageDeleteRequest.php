<?php


namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class MessageDeleteRequest extends FormRequest
{
    private const USER_ID = 'user_id';
    private const CHAT_ID = 'chat_id';
    private const DELETE_FOR_ALL = 'delete_for_all';

    public function rules()
    {
        return [
            self::USER_ID => 'required|exists:users,id',
            self::CHAT_ID => 'required|exists:chats,id',
            self::DELETE_FOR_ALL => 'boolean',
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

    public function getDeleteForAll()
    {
        return $this->input(self::DELETE_FOR_ALL, false);
    }
}

