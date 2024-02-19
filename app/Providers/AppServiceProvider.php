<?php

namespace App\Providers;

use App\Repositories\Write\Chats\Read\Messages\MessageReadRepository;
use App\Repositories\Write\Chats\Read\Messages\MessageReadRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            MessageReadRepositoryInterface::class,
            MessageReadRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
