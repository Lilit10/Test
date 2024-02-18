<?php

namespace App\Http\Controllers\Messages;

use App\Services\Messages\Actions\MessageShowAction;
use App\Http\Requests\Message\MessageShowRequest;
use App\Http\Controllers\Controller;
use App\Services\Messages\Dto\MessageShowDto;

class MessageShowController extends Controller
{
    public function __invoke(MessageShowRequest $request, MessageShowAction $messageShowAction, $chatId)
    {
        $dto = MessageShowDto::fromRequest($request, $chatId);

        $messages = $messageShowAction->run($dto);

        return response()->json($messages);
    }
}

