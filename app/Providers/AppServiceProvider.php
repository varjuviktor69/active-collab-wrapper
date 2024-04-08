<?php

namespace App\Providers;

use App\Interfaces\ActiveCollab\AuthService;
use App\Interfaces\ActiveCollab\TaskService;
use App\Models\User;
use App\Services\ActiveCollab\AuthServiceImpl;
use App\Services\ActiveCollab\TaskServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TaskService::class, TaskServiceImpl::class);
        $this->app->singleton(AuthService::class, AuthServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::viaRequest('active-collab-token', function(Request $request) {
            if ($request->session()->get('active-collab-token')) {
                return new User([
                    'active-collab-token'
                ]);
            } else {
                return null;
            }
        });
    }
}
