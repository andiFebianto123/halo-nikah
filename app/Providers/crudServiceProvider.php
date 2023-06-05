<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Personal;
use App\Library\CrudPanel;

class crudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('crud', function ($app) {
            return new CrudPanel();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
