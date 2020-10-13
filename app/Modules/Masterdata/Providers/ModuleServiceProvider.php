<?php

namespace App\Modules\Masterdata\Providers;

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
        $this->loadTranslationsFrom(module_path('masterdata', 'Resources/Lang', 'app'), 'masterdata');
        $this->loadViewsFrom(module_path('masterdata', 'Resources/Views', 'app'), 'masterdata');
        $this->loadMigrationsFrom(module_path('masterdata', 'Database/Migrations', 'app'), 'masterdata');
        $this->loadConfigsFrom(module_path('masterdata', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('masterdata', 'Database/Factories', 'app'));
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
