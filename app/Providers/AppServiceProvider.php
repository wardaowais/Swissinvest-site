<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\View; // Make sure to import the View facade
use Illuminate\Support\Facades\Auth;
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
        // View::composer('*', function ($view) {
        //     $user = Auth::user();
        //     $view->with('user', $user);
        // });
        
        view()->share('countries', getCountries());
        view()->share('languages', getLanguages());
        view()->share('getNecCategories', getNecCategories());
        view()->share('cities', getCities());
    }
}
