<?php

namespace App\Services\Chats\Dto;

use App\Http\Requests\Chat\ChatStoreRequest;
use App\Models\File;
use phpseclib3\Math\PrimeField\Integer;
use Illuminate\Http\UploadedFile;
class ChatStoreDto
{
    public function __construct(
        public int $user_id,
        public string $name,
        public bool $is_group,
        public ?UploadedFile $avatar,
    ) {}

    public static function fromRequest(ChatStoreRequest $request): self
    {
        return new self(
            $request->getUserId(),
            $request->getName(),
            $request->getIsGroup(),
            $request->file('avatar')
        );
    }
}
