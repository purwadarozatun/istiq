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
        // $this->app['laravolt.menu']->add('Preferences');
        // $this->app['laravolt.menu']->add('File Manager')->data('icon', 'folder');
        
        // $menu = $this->app['laravolt.menu']->add('Systems')->data('icon', 'settings');
        // $menu->add('Log');
        // $menu->add('Backup');
        // $menu->add('Performance');
        // $menu->add('Storage');
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
