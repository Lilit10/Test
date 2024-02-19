<?php

namespace App\Providers;

use App\Repositories\Write\Chats\ChatWriteRepository;
use App\Repositories\Write\Chats\ChatWriteRepositoryInterface;
use App\Repositories\Write\Chats\Write\User\UserWriteRepository;
use App\Repositories\Write\Chats\Write\User\UserWriteRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class,
        );
        $this->app->bind(
            ChatWriteRepositoryInterface::class,
            ChatWriteRepository::class,
        );
    }
}
