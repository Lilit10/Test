<?php

namespace App\Http\Controllers\Messages;

use App\Http\Requests\Message\MessageStoreRequest;
use App\Services\Messages\Actions\MessageStoreAction;
use App\Services\Messages\Dto\MessageStoreDto;
use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use App\Http\Controllers\Controller;

class MessageStoreController extends Controller
{
    public function __invoke(MessageStoreRequest $request, MessageStoreAction $messageStoreAction)
    {
        $dto = MessageStoreDto::fromRequest($request);

        $message = $messageStoreAction->run($dto);

        return response()->json([
            'message' => $message,
            'file_id' => $message->file_id,
        ], 201);
    }
}
