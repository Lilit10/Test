<?php

namespace App\Services\Register\Action;

use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Services\Register\Dto\RegisterDto;
use Illuminate\Support\Facades\Http;

class RegisterAction
{
    public function __construct(
        public UserWriteRepositoryInterface $userWriteRepository,
    ) {}

    public function save(RegisterDto $dto)
    {
        return $this->userWriteRepository->save($dto);
    }
}
