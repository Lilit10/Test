<?php

namespace App\Services\Messages\Actions;

use App\Exceptions\NotAuthorizedForChatException;
use App\Services\Messages\Dto\MessageUpdateDto;
use App\Models\ChatUsers;
use App\Models\File;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UpdateMessageAction
{
    public function run(MessageUpdateDto $dto, $id)
    {
        $userInChat = ChatUsers::where([
            'chat_id' => $dto->chat_id,
            'user_id' => $dto->user_id,
        ])->first();

        if (!$userInChat) {
            throw new NotAuthorizedForChatException();
        }

        $message = Message::findOrFail($id);

        if ($dto->content !== null) {
            $message->content = $dto->content;
        }

        $oldPath = $message->file_path;

        if ($dto->file !== null) {
            if ($message->file_path) {
                Storage::delete($message->file_path);
            }

            $filePath = $dto->file->store('files');

            $file = File::query()->create([
                'file_path' => $filePath,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $message->file_id = $file->id;
            $message->file_path = $filePath;
        }

        $message->save();

        return $message;
    }
}
