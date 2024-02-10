<?php

namespace App\Services\Login\Action;

use App\Models\User;
use App\Services\Login\Dto\LoginUserDto;
use Illuminate\Support\Facades\Http;

class LoginAction
{
    public function run(LoginUserDto $dto)
    {
        $user = User::query()
            ->where('email', $dto->login)
            ->first();

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
