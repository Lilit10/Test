<?php

namespace App\Http\Controllers\Messages;

use App\Http\Requests\Message\MessageDeleteRequest;
use App\Services\Messages\Actions\MessageDeleteAction;
use App\Services\Messages\Dto\MessageDeleteDto;
use App\Http\Controllers\Controller;

class MessageDeleteController extends Controller
{
    public function __invoke(MessageDeleteRequest $request, MessageDeleteAction $messageDeleteAction, $id)
    {
        $dto = MessageDeleteDto::fromRequest($request);

        $messageDeleteAction->run($id, $dto);

        return response()->json(['message' => 'Message deleted successfully']);
    }
}
