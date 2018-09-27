<?php

namespace ILabAfrica\EquipmentInterface;

use Illuminate\Support\ServiceProvider;

class EquipmentInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes/api.php';

        //
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('ILabAfrica\EquipmentInterface\EquipmentInterface');
    }
}
