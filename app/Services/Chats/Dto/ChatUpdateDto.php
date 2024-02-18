<?php

namespace App\Services\Chats\Dto;

use App\Http\Requests\Chat\ChatUpdateRequest;
use Nyholm\Psr7\UploadedFile;

class ChatUpdateDto
{
    public function __construct(
        public int $user_id,
        public ?string $name,
        public ?bool $is_group,
        public ?UploadedFile $avatar,
    ) {}

    public static function fromRequest(ChatUpdateRequest $request): self
    {
        return new self(
            $request->getUserId(),
            $request->get('name'),
            $request->get('is_group'),
            $request->get('avatar')
        );
    }
}
