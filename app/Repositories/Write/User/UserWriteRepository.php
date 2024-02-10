<?php

namespace App\Repositories\Write\User;

use App\Exceptions\SavingErrorException;
use App\Models\User;
use App\Services\Register\Dto\RegisterDto;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function save(RegisterDto $dto): User
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password),
        ]);
    }
}
