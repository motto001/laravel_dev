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
          $this->app['view']->addNamespace('tmpl', config('view.tmpl'));
          $this->app['view']->addNamespace('crud', config('view.crud'));
          // $this->app['view']->prependNamespace('tmpl', __DIR__.'/../resources/views/base');
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
