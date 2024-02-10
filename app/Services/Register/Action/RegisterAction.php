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

    public function run(RegisterDto $dto)
    {
//        $user = User::staticCreate($dto);
        $user = $this->userWriteRepository->save($dto);
        $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env('GRANT_CLIENT_ID'),
            'client_secret' => env('GRANT_CLIENT_SECRET'),
            'username' => $user->email,
            'password' => $dto->password,
            'scope' => '*',
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
