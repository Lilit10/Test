<?php

namespace App\Services\Messages\Dto;

use App\Services\Messages\Dto\Message\UpdateMessageRequest;
use Nyholm\Psr7\UploadedFile;

class MessageUpdateDto
{
    public function __construct(
        public int $user_id,
        public int $chat_id,
        public ?string $content,
        public ?UploadedFile $file
    ) {}

    public static function fromRequest(UpdateMessageRequest $request): self
    {
        return new self(
            $request->getUserId(),
            $request->getChatId(),
            $request->getMessageContent(),
            $request->file('file')
        );
    }
}
