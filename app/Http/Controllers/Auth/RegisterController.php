<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\RegisterRequest;
use App\Resources\Auth\AuthResource;
use App\Services\Register\Action\RegisterAction;
use App\Services\Register\Dto\RegisterDto;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterAction $registerAction)
    {
        $dto = RegisterDto::fromRequest($request);
        $data = $registerAction->run($dto);

        return new AuthResource($data);
    }
}
