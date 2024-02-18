<?php

namespace App\Services\Messages\Actions;

use App\Exceptions\NotAuthorizedForChatException;
use App\Services\Messages\Dto\MessageStoreDto;
use App\Repositories\Read\Messages\MessageReadRepository;
use App\Models\File;
use App\Models\Message;
use Carbon\Carbon;

class MessageStoreAction
{
    private $messageReadRepository;

    public function __construct(MessageReadRepository $messageReadRepository)
    {
        $this->messageReadRepository = $messageReadRepository;
    }

    public function run(MessageStoreDto $dto)
    {
        $userInChat = $this->messageReadRepository->getByChatIdAndUserId($dto->chat_id, $dto->user_id);

        if (!$userInChat) {
            throw new NotAuthorizedForChatException();
        }

        $file = null;

        if ($dto->file_id) {
            $file = File::find($dto->file_id);
        }

        $message = Message::query()->create([
            'user_id' => $dto->user_id,
            'chat_id' => $dto->chat_id,
            'content' => $dto->content,
            'file_id' => $file ? $file->id : null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $message;
    }
}
