<?php

namespace App\Repositories\Write\Chats;

use App\Models\Chat;

interface ChatWriteRepositoryInterface
{
    public function save(array $data): \App\Models\Chat;

}
