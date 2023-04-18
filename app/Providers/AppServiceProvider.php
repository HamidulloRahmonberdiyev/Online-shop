<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\App;
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
        PaginationPaginator::useBootstrapFour();

        View()->composer('components.navbar', function ($view) {
            $view->with('current_locale', App::currentLocale());
            $view->with('all_locales', ['uz', 'en', 'ru']);
        });

        View()->composer('components.navbar', function($view) {
            $view->with('new_orders', Order::all());
        });
    }
}
