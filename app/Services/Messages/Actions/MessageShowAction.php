<?php

namespace App\Services\Messages\Actions;

use App\Exceptions\NotAuthorizedForChatException;
use App\Repositories\Write\Chats\Read\Messages\MessageReadRepository;
use App\Models\Message;
use App\Services\Messages\Dto\MessageShowDto;

class MessageShowAction
{
    private $messageReadRepository;

    public function __construct(MessageReadRepository $messageReadRepository)
    {
        $this->messageReadRepository = $messageReadRepository;
    }

    public function run(MessageShowDto $dto)
    {
        $userInChat = $this->messageReadRepository->getByChatIdAndUserId($dto->chat_id, $dto->user_id);

        if (!$userInChat) {
            throw new NotAuthorizedForChatException();
        }

        return Message::where('chat_id', $dto->chat_id)->get();
    }
}

