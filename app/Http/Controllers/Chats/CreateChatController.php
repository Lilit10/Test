<?php

namespace App\Http\Controllers\Chats;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\CreateChatRequest;
use App\Resources\ChatWithUsersResource;
use App\Services\Chats\Action\CreateChatAction;
use App\Services\Chats\Dto\CreateChatDto;

class CreateChatController extends Controller
{
    public function __invoke(
        CreateChatRequest $createChatRequest,
        CreateChatAction $createChatAction): ChatWithUsersResource
    {
        $dto = CreateChatDto::fromRequest($createChatRequest);

        $chat = $createChatAction->run($dto);

        return new ChatWithUsersResource($chat);
    }
}
