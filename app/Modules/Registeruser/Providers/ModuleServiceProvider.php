<?php

namespace App\Modules\Registeruser\Providers;

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
        $this->loadTranslationsFrom(module_path('registeruser', 'Resources/Lang', 'app'), 'registeruser');
        $this->loadViewsFrom(module_path('registeruser', 'Resources/Views', 'app'), 'registeruser');
        $this->loadMigrationsFrom(module_path('registeruser', 'Database/Migrations', 'app'), 'registeruser');
        $this->loadConfigsFrom(module_path('registeruser', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('registeruser', 'Database/Factories', 'app'));
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
