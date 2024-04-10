<?php

declare(strict_types=1);

namespace App\Http\Middleware\ActiveCollab;

use ActiveCollab\SDK\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ActiveCollabClient
{
    public function handle(Request $request, Closure $next): Response
    {
        App::bind(Client::class, function() {
            return new Client(Auth::guard('active-collab')->user()->getActiveCollabToken());
        });

        return $next($request);
    }
}
