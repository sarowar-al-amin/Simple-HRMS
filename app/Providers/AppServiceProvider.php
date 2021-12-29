<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        Gate::define('review-employees', function (User $user) {
            return $user->role === 3 || $user->role === 2;
        });

        Gate::define('admin', function (User $user) {
            return $user->role === 420;
        });
    }
}
