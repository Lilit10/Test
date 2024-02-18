<?php

namespace App\Http\Controllers\Chats;

use App\Http\Controllers\Controller;
use App\Resources\ChatStoreResource;
use App\Services\Chats\Action\ChatStoreAction;
use App\Services\Chats\Dto\ChatStoreDto;
use App\Http\Requests\Chat\ChatStoreRequest;

class ChatStoreController extends Controller
{
    public function __invoke(ChatStoreRequest $request, ChatStoreAction $storeAction)
    {
        $dto = ChatStoreDto::fromRequest($request);

        $chat = $storeAction->run($dto);

        return new ChatStoreResource($chat);
    }
}
