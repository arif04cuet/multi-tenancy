<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Hyn\Tenancy\Environment;
use Illuminate\Support\Facades\Config;

class GlobalViewVarsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {

            $tenancy = app(Environment::class);
            $hostname = $tenancy->hostname();
            if ($hostname) {
                Config::set('app.url', 'http://' . $hostname->fqdn);
                View::share('tenant', $tenancy);
            }
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
