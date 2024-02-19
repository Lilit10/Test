<?php

namespace App\Repositories\Write\Chats;

use App\Models\Chat;
use App\Repositories\Write\Chats\ChatWriteRepositoryInterface;

class ChatWriteRepository implements ChatWriteRepositoryInterface
{
    public function save(array $data): Chat
    {
        return Chat::create($data);
    }
}
