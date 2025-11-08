<?php

use App\Http\Middleware\CatalegMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    //TODO No funciona aun
    ->withMiddleware(function (Middleware $middleware) {
        /*Aqui afegim els Middleware que nosaltres creem
        $middleware->append(CatalegMiddleware::class);
        */
        /*$middleware->alias([
            'prova'=>CatalegMiddleware::class
        ]);*/
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
