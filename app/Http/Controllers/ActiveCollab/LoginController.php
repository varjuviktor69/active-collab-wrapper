<?php

declare(strict_types=1);

namespace App\Http\Controllers\ActiveCollab;

use Illuminate\View\View;

class LoginController
{
    public function index(): View
    {
        return view('login.index');
    }

    public function login(): void
    {
        // TODO: implement login
    }
}
