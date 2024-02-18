<?php

namespace App\Http\Controllers\Chats;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\ChatShowRequest;
use App\Services\Chats\Action\ChatShowAction;

class ChatShowController extends Controller
{
    public function __invoke(ChatShowRequest $request, ChatShowAction $action, $id)
    {
        $chat = $action->run($id, $request->getUserId());

        return response()->json($chat);
    }
}
