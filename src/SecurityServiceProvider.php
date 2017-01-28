<?php

namespace Flint\Security;

use Illuminate\Support\ServiceProvider;

class SecurityServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (method_exists($this->app['router'], 'aliasMiddleware')) {
            $this->app['router']->aliasMiddleware('security', HandleSecurity::class);
        } else {
            $this->app['router']->middleware('security', HandleSecurity::class);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}