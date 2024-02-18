<?php

namespace App\Http\Controllers\Chats;

use App\Http\Requests\Chat\ChatUpdateRequest;
use App\Models\Chat;
use App\Services\Chats\Action\ChatUpdateAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Chats\Dto\ChatUpdateDto;

class ChatUpdateController extends Controller
{
    protected $chatUpdateAction;

    public function __construct(ChatUpdateAction $chatUpdateAction)
    {
        $this->chatUpdateAction = $chatUpdateAction;
    }

    public function __invoke(ChatUpdateRequest $request, $id)
    {
        $chat = Chat::findOrFail($id);

        $dto = ChatUpdateDto::fromRequest($request);

        $this->chatUpdateAction->run($chat, $dto);

        return response()->json($chat, 200);
    }
}
