<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\ChatUserAddRequest;
use App\Services\Chats\Action\ChatUserAddAction;

class ChatUserController extends Controller
{
    public function __invoke(ChatUserAddRequest $request, ChatUserAddAction $action, $chatId)
    {
        $result = $action->run($chatId, $request->getUserId());

        if (isset($result['error'])) {
            return response()->json($result, 404);
        }

        return response()->json($result);
    }
}
