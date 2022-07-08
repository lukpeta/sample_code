<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();

        View::share('meta_description', 'odsylamy.pl - słowa kluczowe');
        View::share('meta_keywords', 'odsylamy.pl - keywords');
        View::share('meta_title', 'odsylamy.pl');
    }
}
