<?php

namespace App\Services\Chats\Action;

use App\Jobs\SendChatCreatedNotification;
use App\Models\Chat;
use App\Models\User;
use App\Notifications\AddUserToChatNotification;

class ChatUserAddAction
{
    public function run(int $chatId, int $userId): array
    {
        $chat = Chat::find($chatId);

        if (!$chat) {
            return ['error' => 'Chat not found'];
        }

        $user = User::find($userId);

        if (!$user) {
            return ['error' => 'User not found'];
        }

        if (!$chat->is_group && $chat->users->count() > 2) {
            return ['error' => 'Cannot add more than 2 members to a non-group chat'];
        }

        if ($chat->users->contains($user)) {
            return ['message' => 'User is already in the chat'];
        }

        $chat->users()->attach($user);

        $user->notify(new AddUserToChatNotification($chat));

        SendChatCreatedNotification::dispatch($chat);

        return ['message' => 'User added to chat successfully'];
    }
}
