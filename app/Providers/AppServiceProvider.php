<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->composer('layouts.navmenu', function ($view) {
            if (auth()->guard()->check()) {
                $unreadNotifications = Auth::user()->unreadNotifications;
                $view->with('unreadNotifications', $unreadNotifications);
            }
        });
    }
}
