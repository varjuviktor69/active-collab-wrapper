<?php

declare(strict_types=1);

use ActiveCollab\SDK\Exceptions\Authentication;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn () => route('login.index'));
        $middleware->redirectUsersTo(fn () => route('tasks.index'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Authentication $ex) {
            if (Auth::guard('active-collab')->user()) {
                session()->invalidate();
                session()->regenerateToken();

                $message = 'Something went wrong! Please sign in again!';
            } else {
                $message = 'Invalid credentials!';
            }

            return response()->view('login.index', ['loginFailed' => $message], Response::HTTP_UNAUTHORIZED);
        });
    })->create();
