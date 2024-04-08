<?php

declare(strict_types=1);

namespace App\Http\Controllers\ActiveCollab;

use App\Dtos\ActiveCollab\AuthenticationRequestDto;
use App\Interfaces\ActiveCollab\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class LoginController
{
    public function __construct(private AuthService $authService) {}

    public function index(): View
    {
        return view('login.index');
    }

    public function login(Request $request): Redirector|RedirectResponse
    {
        $dto = AuthenticationRequestDto::fromRequest($request);
        $token = $this->authService->generateToken($dto);

        session()->regenerate();
        session()->put('active-collab-token', $token);

        if (url()->previous() !== url()->current()) {
            return redirect()->back();
        } else {
            return redirect()->route('tasks.index');
        }
    }
}
