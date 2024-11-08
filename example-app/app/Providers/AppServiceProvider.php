<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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

        Gate::before(function ($user, $ability) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });
        Gate::after(function ($user, $ability, $result, $arguments) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });
               
        //
        Gate::define('menu', function (User $user) {
            return true;
        });        

        Gate::define('super', function (User $user) {
            return $user->isSuperAdmin();
        });   
        
        Gate::define('access', function (User $user, mixed $mixed) {
            if ($mixed['object']=='menu') {
                if ($mixed['action']=='show') {
                    if ($mixed['id']=='main') {
                        return true;
                    }
                    if ($mixed['id']=='list car') {
                        return false;
                    }
                }
               }
            return true;
        });   

        
    }
}