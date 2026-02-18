<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function ($app) {
            $users = [
                [
                    'name' => 'Mark Doe',
                    'gender' => 'male'
                ],
                [
                    'name' => 'Jane Doe',
                    'gender' => 'female'
                ]
            ];
            return new UserService($users);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}