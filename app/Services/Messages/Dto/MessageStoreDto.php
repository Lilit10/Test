<?php

namespace App\Services\Messages\Dto;

use App\Http\Requests\Message\MessageStoreRequest;
use Nyholm\Psr7\UploadedFile;

class MessageStoreDto
{
    public function __construct(
        public int $user_id,
        public int $chat_id,
        public string $content,
        public ?int $file_id,
    ) {}

    public static function fromRequest(MessageStoreRequest $request): self
    {
        return new self(
            $request->getUserId(),
            $request->getChatId(),
            $request->getMessageContent(),
            $request->getFileId()
        );
    }
}
