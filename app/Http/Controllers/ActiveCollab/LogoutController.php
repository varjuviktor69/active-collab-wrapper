<?php

declare(strict_types=1);

namespace App\Http\Controllers\ActiveCollab;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class LogoutController
{
    public function logout(Request $request): Redirector|RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
