<?php

namespace App\Providers;

use App\Models\CheckoutCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        view()->composer('*', function($view){
            if (Auth::check()) {
                $view->with('user', Auth::user());
                View::share('countcart',CheckoutCart::where('id_user', Auth::user()->id)->where('status_checkout', 'tidak')->count());
            }
         });
    }
}
