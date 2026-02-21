<?php

use App\Http\Middleware\CleanInputs;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    // register middleware aliases before routes load so they are available in web.php
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(CleanInputs::class);
        $middleware->alias([
            'user-middleware' => \App\Http\Middleware\UserMiddleware::class,
        ]);
    })
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
