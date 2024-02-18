<?php

namespace App\Http\Controllers\Chats;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\ChatDeleteRequest;
use App\Services\Chats\Action\ChatDeleteAction;

class ChatDeleteController extends Controller
{
    public function __invoke(ChatDeleteRequest $request, ChatDeleteAction $action, $id)
    {
        $result = $action->run($id, $request->getUserId());

        if (isset($result['error'])) {
            return response()->json($result, 403);
        }

        return response()->json($result);
    }
}
