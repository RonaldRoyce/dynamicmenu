<?php

namespace Ruhruhroy\Dynamicmenu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ruhruhroy\Dynamicmenu\MenuController');
        $this->app->make('Ruhruhroy\Dynamicmenu\MenuItemController');

        $this->loadViewsFrom(__DIR__.'/views', 'dynamicmenu');

        $this->publishes([
          __DIR__.'/migrations/' => database_path('migrations')
      ], 'migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::prefix('api')
     ->middleware('api')
     // ->namespace('ruhruhroy/dynamicmenu')
     ->group(__DIR__ . '/api.php');

        include __DIR__.'/routes.php';

        $this->publishes([
          __DIR__.'/views' => base_path('resources/views/ruhruhroy/dynamicmenu'),
      ]);

        $this->publishes([
          __DIR__.'/public' => public_path('vendor/ruhruhroy/dynamicmenu'),
      ], 'public');
    }
}