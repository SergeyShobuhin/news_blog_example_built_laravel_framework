<?php

use App\Http\Middleware\AdminPanelMiddleware;
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
//        $middleware->append(\App\Http\Middleware\AdminPanelMiddleware::class);
        $middleware->alias([
            'admin' => AdminPanelMiddleware::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'blogs/*',
            'blogs',
//            'http://example.com/foo/bar',
//            'http://example.com/foo/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
