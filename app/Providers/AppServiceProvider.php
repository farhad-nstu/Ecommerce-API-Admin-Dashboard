<?php

namespace App\Providers;

use App\Setting;
use View;
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
        view()->composer('*', function ($view) {
            $setting = Setting::first();
            $view->with('setting',$setting);
        });
    }
    
}
