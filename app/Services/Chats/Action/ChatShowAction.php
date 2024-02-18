<?php

namespace App\Services\Chats\Action;

use App\Models\Chat;
use App\Exceptions\NotAuthorizedForChatException;
use Illuminate\Support\Facades\Auth;

class ChatShowAction
{
    public function run(int $chatId, int $userId): Chat
    {
        $chat = Chat::findOrFail($chatId);

        if (!$this->userIsMember($chat, $userId)) {
            throw new NotAuthorizedForChatException();
        }

        return $chat;
    }

    private function userIsMember(Chat $chat, int $userId): bool
    {
        return $chat->users->contains('id', $userId);
    }
}
