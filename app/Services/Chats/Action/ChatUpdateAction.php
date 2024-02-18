<?php

namespace App\Services\Chats\Action;

use App\Exceptions\NotAuthorizedForChatException;
use App\Models\Chat;
use App\Services\Chats\Dto\ChatUpdateDto;

class ChatUpdateAction
{
    public function run(Chat $chat, ChatUpdateDto $dto)
    {
        $userId = $dto->user_id;

        $userInChat = $chat->users()->where('user_id', $userId)->first();

        if (!$userInChat) {
            throw new NotAuthorizedForChatException();
        }

        $data = [
            'name' => $dto->name,
            'is_group' => $dto->is_group,
            'avatar' => $dto->avatar,
        ];

        $chat->update($data);

        return response()->json(['message' => 'Chat updated successfully'], 200);
    }
}
