<?php

namespace App\Services\Chats\Dto;


use App\Http\Requests\Chat\CreateChatRequest;

class CreateChatDto
{
    public function __construct(
        public string  $name,
        public bool    $is_group,
        public ?string $avatar,
        public array   $user_ids
    )
    {
    }

    public static function fromRequest(CreateChatRequest $request): self
    {
        return new self(
            $request->getName(),
            $request->getIsGroup(),
            $request->getAvatar(),
            $request->getUserIds()
        );
    }
}
