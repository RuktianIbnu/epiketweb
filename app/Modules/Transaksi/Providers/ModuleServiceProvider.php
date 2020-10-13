<?php

namespace App\Modules\Transaksi\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('transaksi', 'Resources/Lang', 'app'), 'transaksi');
        $this->loadViewsFrom(module_path('transaksi', 'Resources/Views', 'app'), 'transaksi');
        $this->loadMigrationsFrom(module_path('transaksi', 'Database/Migrations', 'app'), 'transaksi');
        $this->loadConfigsFrom(module_path('transaksi', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('transaksi', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
