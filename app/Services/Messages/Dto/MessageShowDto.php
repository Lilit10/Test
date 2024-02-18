<?php

namespace App\Services\Messages\Dto;

use App\Http\Requests\Message\MessageShowRequest;

class MessageShowDto
{
    public function __construct(
        public int $user_id,
        public int $chat_id
    ) {}

    public static function fromRequest(MessageShowRequest $request, int $chatId): self
    {
        return new self(
            $request->getUserId(),
            $chatId
        );
    }
}
