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
        $tenancy = app(Environment::class);
        $hostname = $tenancy->hostname();
        Config::set('app.url', 'http://' . $hostname->fqdn);
        View::share('hostname', $hostname);
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
