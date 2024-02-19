<?php


namespace App\Services\Messages\Actions;

use App\Exceptions\NotAuthorizedForChatException;
use App\Models\File;
use App\Repositories\Write\Chats\Read\Messages\MessageReadRepository;
use App\Models\Message;
use App\Services\Messages\Dto\MessageDeleteDto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MessageDeleteAction
{
    private $messageReadRepository;

    public function __construct(MessageReadRepository $messageReadRepository)
    {
        $this->messageReadRepository = $messageReadRepository;
    }

    public function run(int $id, MessageDeleteDto $dto)
    {
        $message = Message::findOrFail($id);
        $userInChat = $this->messageReadRepository->getByChatIdAndUserId($dto->chat_id, $dto->user_id);

        if (!$userInChat) {
            throw new NotAuthorizedForChatException();
        }

        if ($message->file_path) {
            Storage::disk('public')->delete($message->file_path);
            File::query()->where('file_path', $message->file_path)->delete();
        }

        if ($dto->delete_for_all) {
            Message::where('id', $id)->delete();
        } else {
            $message->delete();
        }
    }
}
