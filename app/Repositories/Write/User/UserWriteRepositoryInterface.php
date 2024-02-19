<?php

namespace App\Repositories\Write\Chats\Write\User;

use App\Models\User;
use App\Services\Register\Dto\RegisterDto;

interface UserWriteRepositoryInterface
{
    public function save(RegisterDto $dto): User;
}
