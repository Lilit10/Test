<?php

namespace App\Services\Chats\Action;

use App\Models\Chat;
use App\Models\ChatUsers;
use App\Repositories\Write\Chats\ChatWriteRepositoryInterface;
use App\Services\Chats\Dto\CreateChatDto;

class CreateChatAction
{
    public function __construct(
        protected ChatWriteRepositoryInterface $chatWriteRepository,
    ) {}
    public const DEFAULT_CHAT_NAME = 'New Chat';

    public function run(CreateChatDto $dto): Chat
    {
        $chat = $this->chatWriteRepository->save([
            'name' => $dto->name ?? self::DEFAULT_CHAT_NAME,
            'is_group' => $dto->is_group,
            'avatar' => $dto->avatar,
        ]);

        $chat->users()->attach($dto->user_ids);

        return $chat;
    }
}
