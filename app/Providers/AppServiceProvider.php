<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $c = CaiDat::where('type', 'footer')->first();
        // view()->share('footer', $c->value);

        // $c = CaiDat::where('type', 'header')->first();
        // view()->share('header', $c->value);
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
