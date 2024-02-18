<?php

// app/Services/Chats/Action/ChatUserRemoveAction.php

namespace App\Services\Chats\Action;

use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\User;
use App\Notifications\RemoveUserFromChatNotification;

class ChatUserRemoveAction
{
    public function run($chatId, $userId)
    {
        $chat = Chat::find($chatId);

        if (!$chat) {
            return ['error' => 'Chat not found'];
        }

        $user = User::find($userId);

        if (!$user) {
            return ['error' => 'User not found'];
        }

        $userInChat = ChatUsers::where('chat_id', $chatId)
            ->where('user_id', $userId)
            ->first();

        if (!$userInChat) {
            return ['error' => 'User is not a member of this chat'];
        } else {
            $chat->users()->detach($user);
        }

        $user->notify(new RemoveUserFromChatNotification($chat));

        return ['message' => 'User deleted from chat successfully'];
    }
}
