<?php

namespace App\Modules\Laporan\Providers;

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
        $this->loadTranslationsFrom(module_path('laporan', 'Resources/Lang', 'app'), 'laporan');
        $this->loadViewsFrom(module_path('laporan', 'Resources/Views', 'app'), 'laporan');
        $this->loadMigrationsFrom(module_path('laporan', 'Database/Migrations', 'app'), 'laporan');
        $this->loadConfigsFrom(module_path('laporan', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('laporan', 'Database/Factories', 'app'));
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
