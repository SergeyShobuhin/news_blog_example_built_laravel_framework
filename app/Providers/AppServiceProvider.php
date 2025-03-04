<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::bootstrap-5');
        Paginator::defaultSimpleView('pagination::simple-bootstrap-5');
        Gate::policy(User::class, AdminPolicy::class); //ПЕРВЫЙ ВАРИАНТ АДМИН ПАНЕЛИ
        Gate::define('admin-dashboard', function (User $user) {
            return $user->role === 'admin';
        }); // ВТОРОЙ ВАРИАНТ АДМИН ПАНЕЛИ
    }
}
