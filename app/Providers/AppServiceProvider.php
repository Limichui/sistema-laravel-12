<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        // If you want to use Bootstrap 5, uncomment the line below:
        // Paginator::useBootstrapFive();
        // If you want to use Tailwind CSS, uncomment the line below:
        // Paginator::useTailwind();
        // If you want to use custom pagination views, you can specify them here:
        // Paginator::defaultView('vendor.pagination.custom');
        // Paginator::defaultSimpleView('vendor.pagination.simple-custom');
        // You can also set the default pagination length:
    }
}
