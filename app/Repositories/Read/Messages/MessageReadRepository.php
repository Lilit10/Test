<?php

namespace App\Repositories\Read\Messages;

use App\Models\ChatUsers;

class MessageReadRepository implements MessageReadRepositoryInterface
{
    public function getByChatIdAndUserId(int $chatId, int $userId)
    {
        // Assuming you want to retrieve data based on chat_id and user_id
        return ChatUsers::query()
            ->where('chat_id', $chatId)
            ->where('user_id', $userId)
            ->first(); // Assuming you want to get a single record
    }
}
