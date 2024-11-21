<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'superadmin' => \App\Http\Middleware\SuperAdmin::class,
            'adminOrSuperadmin' => \App\Http\Middleware\AdminOrSuperadmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withCommands([
        \App\Console\Commands\RunHistoryMaker::class,
    ])
    ->create();
