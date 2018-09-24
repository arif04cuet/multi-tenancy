<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Hyn\Tenancy\Environment;

class EnforceTenancy
{
    public function handle($request, Closure $next)
    {
        Config::set('database.default', 'tenant');

        return $next($request);
    }
}
