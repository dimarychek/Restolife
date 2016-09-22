<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('menu', Page::where('show_in_menu', 1)->orderBy('sort_order', 'asc')->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
