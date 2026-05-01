<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once($filename);
        }
        //
//        if($this->app->environment('prod')) {
//            \URL::forceScheme('https');
//        }
    }
}
