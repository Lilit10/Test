<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Chats\Action\ChatUserRemoveAction;
use Illuminate\Http\Request;

class ChatUserRemoveController extends Controller
{
    public function __invoke(ChatUserRemoveAction $action, $chatId, $userId)
    {
        $result = $action->run($chatId, $userId);

        if (isset($result['error'])) {
            return $result;
        }

        return $result;
    }
}

