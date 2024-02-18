<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Messages\Dto\Message\File\Auth\Login\LoginRequest;
use App\Resources\Auth\AuthResource;
use App\Services\Login\Action\LoginAction;
use App\Services\Login\Dto\LoginUserDto;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginAction $loginAction): AuthResource {
        $dto = LoginUserDto::fromRequest($request);

        $data = $loginAction->run($dto);

        return new AuthResource($data);
    }
}
