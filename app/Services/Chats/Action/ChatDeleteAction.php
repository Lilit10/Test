<?php

namespace App\Services\Chats\Action;

use App\Models\Chat;
use App\Events\ChatDeleted;

class ChatDeleteAction
{
    public function run(int $id, int $userId): array
    {
        $chat = Chat::findOrFail($id);

        if ($userId !== $chat->user_id) {
            return ['error' => 'You are not admin in this chat'];
        }

        $chat->users()->detach();

        ChatDeleted::dispatch($id);

        $chat->delete();

        return ['message' => 'Chat deleted successfully'];
    }
}
