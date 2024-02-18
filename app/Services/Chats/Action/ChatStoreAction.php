<?php

namespace App\Services\Chats\Action;

use App\Models\Chat;
use App\Models\ChatUsers;
use App\Services\Chats\Dto\ChatStoreDto;

class ChatStoreAction
{
    public function run(ChatStoreDto $dto)
    {
        $data = [
            'user_id' => $dto->user_id,
            'name' => $dto->name,
            'is_group' => $dto->is_group,
            'avatar' => $dto->avatar,
        ];
        $chat = Chat::create($data);

        ChatUsers::create([
            'chat_id' => $chat->id,
            'user_id' => $dto->user_id,
        ]);

        return Chat::query()->create($data);
    }
}
