<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class ChatUserRemoveRequest extends FormRequest
{
    public function rules()
    {
        return [
//            'user_id' => 'required|exists:users,id',
//            'chat_id' => 'required|exists:chats,id',
        ];
    }

    public function getUserId()
    {
        return $this->input('user_id');
    }

    public function getChatId()
    {
        return $this->input('chat_id');
    }
}
