<?php

namespace App\Http\Controllers\Messages;

use App\Exceptions\NotAuthorizedForChatException;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Services\Messages\Dto\MessageUpdateRequest;
use App\Services\Messages\Actions\MessageUpdateAction;
use App\Http\Controllers\Controller;
use App\Services\Messages\Actions\UpdateMessageAction;
use App\Services\Messages\Dto\MessageStoreDto;
use App\Services\Messages\Dto\MessageUpdateDto;
use Illuminate\Http\JsonResponse;

class MessageUpdateController extends Controller
{
    private $messageUpdateAction;

    public function __construct(UpdateMessageAction $messageUpdateAction)
    {
        $this->messageUpdateAction = $messageUpdateAction;
    }

    public function __invoke(UpdateMessageRequest $request, $id): JsonResponse
    {
        $dto = MessageUpdateDto::fromRequest($request);

        try {
            $message = $this->messageUpdateAction->run($dto, $id);
            return response()->json($message);
        } catch (NotAuthorizedForChatException $exception) {
            return response()->json(['error' => 'User not authorized to update this message'], 401);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Failed to update message'], 500);
        }
    }
}
