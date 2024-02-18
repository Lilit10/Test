<?php

namespace App\Services\Messages\Dto;

use App\Http\Requests\Message\MessageDeleteRequest;

class MessageDeleteDto
{
    public function __construct(
        public int $user_id,
        public int $chat_id,
        public bool $delete_for_all
    ) {}

    public static function fromRequest(MessageDeleteRequest $request): self
    {
        return new self(
            $request->getUserId(),
            $request->getChatId(),
            $request->getDeleteForAll()
        );
    }
}
